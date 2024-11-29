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
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class OrderItemResource extends Resource
{
    protected static ?string $model = OrderItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationParentItem = "Orders Controllers";
    protected static ?string $label = "Orders Items";

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
                TextColumn::make('order_id')
                    ->label('Order ID'),
                TextColumn::make('product_id')
                    ->label('Product ID'),
                TextColumn::make('quantity')
                    ->label('Quantity')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('total')
                    ->label('Total')
                    ->searchable()
                    ->sortable(),
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
            'index' => Pages\ListOrderItems::route('/'),
            'create' => Pages\CreateOrderItem::route('/create'),
            'edit' => Pages\EditOrderItem::route('/{record}/edit'),
        ];
    }
}
