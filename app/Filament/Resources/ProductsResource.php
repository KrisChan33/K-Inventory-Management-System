<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Filament\Resources\ProductsResource\RelationManagers;
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
    protected static ?string $model = Products::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Products Controller';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                    Section::make('Product Information')
                    ->schema([
                        TextInput::make('name')
                            ->label('Name')
                            ->required(),
                        TextInput::make('price')
                            ->label('Price')
                            ->required(),
                        Textarea::make('description')
                            ->label('Description')
                            ->cols(4)
                            ->rows(4)
                            ->required(),
                        TextInput::make('stock_quantity')
                            ->label('Stock Quantity')
                            ->required(),
                            Select::make('categories_id')
                            ->relationship('category', 'name')
                                ->label('Category ID')
                                ->searchable()
                                ->sortable(),
                        // TextInput::make('supplier_id')
                        //     ->label('Supplier ID')
                        //     ->required(),
                    ])->columns(2),
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
                TextColumn::make('description')
                    ->label('Description')
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
                TextColumn::make('category_id')
                    ->label('Category ID')
                    ->searchable()
                    ->sortable(),
                // TextColumn::make('supplier_id')
                //     ->label('Supplier ID')
                //     ->searchable()
                //     ->sortable(),
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
