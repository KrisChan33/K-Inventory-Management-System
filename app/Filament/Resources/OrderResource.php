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
use Filament\Notifications\Notification;
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
    protected static ?string $navigationGroup = "Controllers (Admin)";
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

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
                TextInput::make('total')
                    ->label('Total')
                    ->rules('numeric')
                    ->dehydrated()
                    ->visibleOn(['edit'])
                    ->disabled(),
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
                    ->live()
                    ->required()
                    ->afterStateUpdated(function (callable $get, callable $set) {
                            $product = Product::find($get('product_id'));
                            if ($product) {
                                if ($product->stock_quantity > 0) {
                                    $set('quantity', 1);
                                    $set('total', $product->price * $get('quantity'));
                                    $set('price', $product->price);
                                    $set('status', 'Pending');
                                }

                                if ($product->stock_quantity == 0) {
                                    $set('quantity', 0);
                                    $set('status', 'Cancelled');
                                    $set('total', 0.00);

                                    Notification::make()
                                    ->title('Product is out of stock')
                                    ->body('Please select another product')
                                    ->danger()
                                    ->send();
                                }
                            }
                        }),
                    TextInput::make('quantity')
                    ->label('Quantity')
                    ->integer()
                    ->rules('required', 'numeric')
                    ->required()
                    ->live()
                    // ->beforeStateDehydrated(function (callable $get, callable $set) {
                    //     $product = Product::find($get('product_id'));
                    //     if ($product) {
                    //         $set('total', $product->price * $get('quantity'));
                    //     }
                    // })
                    ->afterStateUpdated(function (callable $get, callable $set) {
                        $product = Product::find($get('product_id'));
                        if ($product) { 

                            if ($product->stock_quantity > 0) {
                                $set('status', 'Pending');
                                $set('price', $product->price);
                                $set('total', $product->price * $get('quantity'));
                            }
                       
                            if ($product->stock_quantity == 0) {
                                $set('status', 'Cancelled');
                                $set('total', 0.00);
                                Notification::make()
                                    ->title('Product is out of stock')
                                    ->body('Please select another product')
                                    ->danger()
                                    ->send();
                            }
                            if ($product->stock_quantity < $get('quantity')) {
                                $set('status', 'Cancelled');
                                $set('quantity', $product->stock_quantity);
                                $set('total', $product->price * $get('quantity'));
                                // dd("Stock quantity is less than quantity");
                                Notification::make()
                                                        ->title('Product Quantity is only ' . $product->stock_quantity)
                                                        ->body('Please reduce the quantity to ' . $product->stock_quantity)
                                                        ->danger()
                                                        ->send();
                            }
                        }

                    })
                    ->disabled(fn (callable $get) => optional(Product::find($get('product_id')))->stock_quantity == 0)
                    ->maxValue(fn (callable $get) => Product::where('id', $get('product_id'))->first()->stock_quantity) 
                    ->dehydrated()
                    ->minValue(1),

                    TextInput::make('total')
                        ->label('Total')
                        ->rules('required', 'numeric')
                        ->live()
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
