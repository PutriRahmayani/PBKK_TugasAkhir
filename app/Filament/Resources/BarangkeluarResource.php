<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangkeluarResource\Pages;
use App\Filament\Resources\BarangkeluarResource\RelationManagers;
use App\Models\Barangkeluar;
use DateTime;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use function Laravel\Prompts\select;

class BarangkeluarResource extends Resource
{
    protected static ?string $model = Barangkeluar::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder-minus';

    protected static ?string $navigationLabel = 'Barang Keluar';

    protected static ?string $navigationGroup = 'Data Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama_barang')->required(),
                TextInput::make('merek')->required(),
                TextInput::make('jumlah')->required(),
                DateTimePicker::make('tanggal_keluar')->required()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_barang'),
                TextColumn::make('merek'),
                TextColumn::make('jumlah'),
                TextColumn::make('tanggal_keluar')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
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
            'index' => Pages\ListBarangkeluars::route('/'),
            //'create' => Pages\CreateBarangkeluar::route('/create'),
            //'edit' => Pages\EditBarangkeluar::route('/{record}/edit'),
        ];
    }    
}
