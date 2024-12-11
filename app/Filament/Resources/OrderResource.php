<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use App\Models\OrderItem;
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
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Log;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;
    protected static ?string $label = "Orders";
    protected static ?string $navigationGroup = "Inventory Management";
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
    {
        $isEditing = isset($orderId) && !empty($orderId);

        return $form
            ->schema([
        // Section::make()->columns(2)->schema([
        //     Select::make('customer_id')
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

        // 'customer_id',
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
                Select::make('customer_id')
                ->label('Customer')
                ->relationship('customer', 'name')
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
                    ->afterStateUpdated(function (callable $get, callable $set, $state) {
                        $orderId = $get('id');
                        $order = Order::find($orderId);
                        if ($order) {
                            // Use batch update to update all OrderItems at once
                            OrderItem::where('order_id', $orderId)->update(['status' => $state]);
                
                            // Retrieve the updated OrderItems
                            $orderItems = $order->orderItems;
                
                            // Log the update
                            foreach ($orderItems as $orderItem) {
                                Log::info('OrderItem status updated', ['orderItemId' => $orderItem->id, 'status' => $orderItem->status]);
                            }
                
                            // Update the form state for each OrderItem
                            $set('orderItems', $orderItems->toArray());
                        }
                    })
                    ->live()
                    ->visibleOn(['edit']),
                    TextInput::make('address')
                    ->label('Address')
                    ->required()
                    ->columnSpanFull(),
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
                        })
                        ->disabled(fn(callable $get) => $get('status') == 'Cancelled' || $get('status') == 'Completed' || $get('status') == 'Processing')
                        ,
                    TextInput::make('quantity')
                    ->label('Quantity')
                    ->integer()
                    ->rules('required', 'numeric',)
                    ->required()
                    ->live()
                    ->debounce(1000)
                    ->disabled(fn (callable $get) => optional(Product::find($get('product_id')))->stock_quantity <= 0 || $get('status') == 'Cancelled' || $get('status') == 'Completed' || $get('status') == 'Processing')
                    // ->maxValue(fn (callable $get) => optional(Product::find($get('product_id')))->stock_quantity)
                    // ->maxValue(fn (callable $get) => optional(Product::find($get('product_id')))->stock_quantity  )
                    ->maxValue(function (callable $get) {
                        $checkStock = $get('check_stock'); // Assuming you have a way to determine if stock should be checked
                        if (!$checkStock) {
                            return null; // Disable max value check
                        }
                        $stockQuantity = optional(Product::find($get('product_id')))->stock_quantity;
                        $orderItems = OrderItem::where('product_id', $get('product_id'))->get();
                        
                        if ($stockQuantity > 0) {
                            return $stockQuantity;
                        } elseif ($orderItems->sum('quantity') > 0) {
                            return $orderItems->sum('quantity');
                        } else {
                            return 0;
                        }
                    })
                    ->minValue(1)   
                    ->dehydrated()
                    ->afterStateUpdated(function (callable $get, callable $set) {
                        $product = Product::find($get('product_id'));
                        if ($product) { 
                            $price = (float) $product->price;
                            $quantity = (int) $get('quantity');
                            if ($product->stock_quantity == 0) {
                                $set('status', 'Cancelled');
                                $set('total', 0.00);
                                Notification::make()
                                    ->title('Product is out of stock')
                                    ->body('Please select another product')
                                    ->danger()
                                    ->send();
                            } elseif ($product->stock_quantity < $quantity) {
                                $set('status', 'Pending');
                                $set('quantity', $product->stock_quantity);
                                $set('total',  $product->stock_quantity * $price);
                                Notification::make()
                                    ->title('Product Quantity is only ' . $product->stock_quantity)
                                    ->body('Please reduce the quantity to ' . $product->stock_quantity)
                                    ->danger()
                                    ->send();
                            } else {
                                $set('status', 'Pending');
                                $set('price', $price);
                                $set('total', $price * $quantity);
                            }
                        }
                    })
                    ,
                    Select::make('status')
                        ->label('Status')
                        ->options([
                            'Pending' => 'Pending',
                            'Processing' => 'Processing',
                            'Completed' => 'Completed',
                            'Cancelled' => 'Cancelled',
                        ])
                        ->visibleOn(['edit'])
                        ->live()
                        ->required(),
                    TextInput::make('total')
                        ->label('Total')
                        ->rules('required', 'numeric')
                        ->disabled(fn(callable $get) => $get('status') == 'Cancelled' || $get('status') == 'Completed' || $get('status') == 'Processing' || $get('status') == 'Pending')
                        ->live()
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
                    TextColumn::make('customer.name')
                        ->label('Customer Order')
                        ->icon('heroicon-s-user')
                        ->iconColor('primary')
                        ,
                    // TextColumn::make('quantity')
                    //     ->label('Quantity')
                    //     ->searchable()
                    //     ->sortable(),
                    TextColumn::make('total')
                        ->label('Total Order')
                        ->searchable()
                        ->sortable()
                        ->icon('heroicon-o-banknotes')
                        ->iconColor('primary')
                        ->summarize(
                            Sum::make()->money('PHP')
                            ->label('Total Amount Orders')
                        ),
                    TextColumn::make('status')
                        ->label('Status')
                        ->searchable()
                        ->sortable()
                        ->summarize(
                            Count::make()
                            ->label('Total Orders')
                        )
                    ->alignCenter()
                    ,
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
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\ViewAction::make(),
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
