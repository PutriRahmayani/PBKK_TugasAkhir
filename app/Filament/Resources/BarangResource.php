<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangResource\Pages;
use App\Filament\Resources\BarangResource\RelationManagers;
use App\Models\Barang;
use Faker\Core\Number;
use Filament\Forms;
use Filament\Forms\Components\Card;
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

use function Laravel\Prompts\search;

class BarangResource extends Resource
{
    protected static ?string $model = Barang::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $navigationLabel = 'Barang';

    protected static ?string $navigationGroup = 'Data Barang';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('ruangan_id')
                ->required()
                ->relationship('ruangan', 'nama_ruangan'),
                TextInput::make('nama')->required(),
                TextInput::make('merek')->required(),
                TextInput::make('jumlah')->required(),
                Select::make('kondisi')    
                    ->options([
                        'baik' => 'Baik',
                        'rusak' => 'Rusak'    
                    ])->required(),
                TextInput::make('asal_barang')->required(),
                Select::make('ketersediaan')    
                    ->options([
                        'ada' => 'Ada',
                        'tidak' => 'Tidak'    
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('ruangan.nama_ruangan'),
                TextColumn::make('nama')->Searchable(),
                TextColumn::make('merek')->Searchable(),
                TextColumn::make('jumlah'),   
                TextColumn::make('kondisi')->searchable(),
                TextColumn::make('asal_barang')->Searchable(),
                TextColumn::make('ketersediaan')->searchable()
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
