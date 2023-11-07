<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Faker\Core\Number;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama'),
                TextInput::make('merek'),
                TextInput::make('jumlah'),
                Select::make('kondisi')    
                    ->options([
                        'baik' => 'Baik',
                        'rusak' => 'Rusak'    
                    ])->required(),
                TextInput::make('asal_barang'),
                Select::make('ketersediaan')    
                    ->options([
                        'ada' => 'Ada',
                        'tidak' => 'Tidak'    
                    ])->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('merek'),
                TextColumn::make('jumlah'),   
                SelectColumn::make('kondisi')
                ->options([
                    'baik' => 'Baik',
                    'rusak' => 'Rusak',
                ]),
                TextColumn::make('asal_barang'),
                SelectColumn::make('ketersediaan')
                ->options([
                    'ada' => 'Ada',
                    'tidak' => 'Tidak',
                ])
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListBarangs::route('/'),
            //'create' => Pages\CreateBarang::route('/create'),
            //'edit' => Pages\EditBarang::route('/{record}/edit'),
        ];
    }    
}
