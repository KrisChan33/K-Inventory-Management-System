<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
use App\Models\Product;
use App\Models\Products;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $label = 'Products Controller';
    protected static ?int $navigationSort= 2 ;
    protected static ?string $navigationGroup = "Controllers (Admin)";
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Section::make('Product Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        Select::make('category_id')
                            ->relationship('category', 'name')
                            ->label('Category')
                            ->required(),
                        Select::make('supplier_id')
                            ->label('Supplier')
                            ->relationship('supplier', 'name')
                            ->required(),
                        TextInput::make('price')
                            ->label('Price')
                            ->required(),
                        TextInput::make('stock_quantity')
                            ->label('Stock Quantity')
                            ->required(),
                        Textarea::make('description')
                            ->label('Description')
                            ->columnSpanFull()
                            ->rows(4)
                            ->required(),
                       
                    ])->columns(5),
            ]);
    }
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Price')
                    ->icon('heroicon-o-banknotes')
                    ->iconColor('primary')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('stock_quantity')
                    ->label('Stock Quantity')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('supplier.name')
                    ->label('Supplier')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description')
                    ->label('Description')
                    ->limit(25)
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
