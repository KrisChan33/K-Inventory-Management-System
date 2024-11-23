<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SupplierResource\Pages;
use App\Filament\Resources\SupplierResource\RelationManagers;
use App\Models\Supplier;
use App\Models\Suppliers;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SupplierResource extends Resource
{
    protected static ?string $model = Suppliers::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $label = 'Suppliers Controller';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                        Section::make('Supplier Information')
                            ->schema([
                        TextInput::make('name')
                            ->label('Company/Business Name')
                            ->required(),
                        TextInput::make('contact_person')
                            ->label('Contact Person')
                            ->required(),
                        TextInput::make('contact_email')
                            ->label('Contact Email')
                            ->required(),
                        TextInput::make('contact_phone')
                            ->label('Contact Phone')
                            ->required(),
                        TextInput::make('contact_address')
                            ->label('Contact Address')
                            ->required()
                            ->columnSpanFull(),
                            ])->columns(4),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Company/Business Name')
                    ->limit(18)
                    ->searchable()
                    ->icon('heroicon-s-user')
                    ->iconColor('primary')
                    ->sortable(),
                TextColumn::make('contact_person')
                    ->label('Contact Person')
                    ->searchable()
                    ->limit(20)
                    ->icon('heroicon-s-user')
                    ->iconColor('primary')
                    ->sortable(),
                TextColumn::make('contact_address')
                    ->label('Address')
                    ->searchable()
                    ->limit(20)
                    ->icon('heroicon-s-map')
                    ->iconColor('primary')
                    ->sortable(),
                TextColumn::make('contact_phone')
                    ->label('Phone')
                    ->icon('heroicon-s-phone')
                    ->iconColor('primary')
                    ->sortable(),
                TextColumn::make('contact_email')
                    ->limit(19)
                    ->label('Email')
                    ->icon('heroicon-s-envelope')
                    ->iconColor('primary')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListSuppliers::route('/'),
            'create' => Pages\CreateSupplier::route('/create'),
            'edit' => Pages\EditSupplier::route('/{record}/edit'),
        ];
    }
}