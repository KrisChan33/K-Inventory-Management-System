<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\Orders;
use App\Models\Product;
use Faker\Provider\ar_EG\Text;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $label = "Orders Controllers";
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
        // Section::make()->columns(2)->schema([
        //     Select::make('user_id')
        //         ->label('User')
        //         ->relationship('user', 'name')
        //         ->required(),
        //     TextInput::make('quantity')
        //         ->label('Quantity')
        //         ->rules('required', 'numeric')
        //         ->required(),

        //     TextInput::make('total')
        //         ->label('Total')
        //         ->rules('required', 'numeric')
        //         ->required(),

        //     Select::make('status')
        //         ->label('Status')
        //         ->required()
        //         ->options([
        //             'Pending' => 'Pending',
        //             'Processing' => 'Processing',
        //             'Completed' => 'Completed',
        //             'Cancelled' => 'Cancelled',
        //         ]),
        // ]),
        

        // 'user_id',
        // 'order_number',
        // 'total',
        // 'status',
        // 'message_for_seller',

        Wizard::make()->schema([    
            Step::make('Order Details')
            ->schema([
                TextInput::make('order_number')
                    ->label('Order Number')
                    ->default('ORD-' . strtoupper(Str::random(6)))
                    ->disabled()
                    ->dehydrated(),
                Select::make('user_id')
                ->label('User')
                ->relationship('user', 'name')
                ->required(),
                // TextInput::make('total')
                //     ->label('Total')
                //     ->rules('numeric')
                //     ->readOnly(),
                Select::make('status')
                    ->label('Status')
                    ->default('Pending')
                    ->required()
                    ->options([
                        'Pending' => 'Pending',
                        'Processing' => 'Processing',
                        'Completed' => 'Completed',
                        'Cancelled' => 'Cancelled',
                    ])
                    ->visibleOn(['edit']),
                MarkdownEditor::make('message_for_seller')
                    ->label('Message for Seller')
                    ->columnSpanFull()
                    ->toolbarButtons([
                        'blockquote',
                        'bold',
                        'italic',
                        'link',
                        'orderedList',
                        'redo',
                        'undo',
                ])
                    ->nullable(),

            ])->columns(2),

            Step::make('order_items')
            ->label('Order Items')
            ->schema([
                Forms\Components\Repeater::make('orderItems')
                ->relationship('orderItems')
                ->schema([
                    Select::make('product_id')
                        ->label('Product')
                        ->relationship('product', 'name')
                        ->required()
                        ->afterStateUpdated(function (callable $get, callable $set) {
                            $product = Product::find($get('product_id'));
                            if ($product) {
                                $set('price', $product->price);
                                $set('total', $product->price * $get('quantity'));
                            }
                        }),
                    TextInput::make('quantity')
                    ->label('Quantity')
                    ->integer()
                    ->rules('required', 'numeric')
                    ->required()
                    ->live()
                    ->afterStateUpdated(function (callable $get, callable $set) {
                        $product = Product::find($get('product_id'));
                        if ($product) {
                            $set('total', $product->price * $get('quantity'));
                        }
                    }),
                    TextInput::make('total')
                        ->label('Total')
                        ->rules('required', 'numeric')
                        ->disabled()
                        ->dehydrated()
                        ->required(),
                ])->columns(2)->createItemButtonLabel('Add Order Item'),
        ])->columns(1),
])->columnSpanFull(),
]);
}

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                    TextColumn::make('user.name')
                        ->label('User'),
                    // TextColumn::make('quantity')
                    //     ->label('Quantity')
                    //     ->searchable()
                    //     ->sortable(),
                    TextColumn::make('total')
                        ->label('Total')
                        ->searchable()
                        ->sortable()
                        ->summarize(
                            Sum::make()->money()
                        ),
                    TextColumn::make('status')
                        ->label('Status')
                        ->searchable()
                        ->sortable(),
                    TextColumn::make('created_at')
                        ->label('Order Date')
                        ->searchable()
                        ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
