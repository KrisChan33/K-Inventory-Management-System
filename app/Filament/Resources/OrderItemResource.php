<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderItemResource\Pages;
use App\Filament\Resources\OrderItemResource\RelationManagers;
use App\Models\OrderItem;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Count;
use Filament\Tables\Columns\Summarizers\Sum;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class OrderItemResource extends Resource
{
    protected static ?string $model = OrderItem::class;

    protected static ?string $navigationParentItem = "Orders Controllers";
    protected static ?string $label = "Orders Items Controller";
    protected static ?string $navigationGroup = "Controllers (Admin)";
    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Orders Items Information')
                    ->schema([
                        Select::make('order_id')
                            ->label('Order ID')
                            ->required()
                            ->relationship('order', 'order_number'),
                        Select::make('product_id')
                            ->label('Product ID')
                            ->required()
                            ->relationship('product', 'name'),
                        TextInput::make('total')
                            ->required()
                            ->numeric()
                            ->label('Total')
                            ->required(),
                        Select::make('status')
                            ->label('Status')
                            ->required()
                            ->default('Pending')
                            ->options([
                                'Pending' => 'Pending',
                                'Processing' => 'Processing',
                                'Completed' => 'Completed',
                                'Cancelled' => 'Cancelled',
                                ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.order_number')
                    ->label('Order No.')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('product.name')
                    ->label('Product Name')
                  
                    ,
                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->searchable()
                    ->summarize(
                        Sum::make()->label('Total Quantity'),
                    )
                    ->sortable(),
                TextColumn::make('total')
                    ->label('Total')
                    ->searchable()
                    ->icon('heroicon-o-banknotes')
                    ->iconColor('primary')
                    ->summarize(
                        Sum::make()->money('php')->label('Total Amount'),
                    )
                    ->sortable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->searchable()
                    ->sortable()
                    ->summarize(
                        Count::make()->label('Total Products'),
                    )
                   ,
                TextColumn::make('created_at')
                    ->label('Order Date')
                    ->searchable()
                    ->sortable()
                  ,
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
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItem::route('/create'),
            'edit' => Pages\EditOrderItem::route('/{record}/edit'),
        ];
    }
}
