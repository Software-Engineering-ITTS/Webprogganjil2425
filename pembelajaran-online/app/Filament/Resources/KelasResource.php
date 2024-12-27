<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use App\Filament\Resources\KelasResource\Pages;
use App\Models\Kelas;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;

class KelasResource extends Resource
{
    protected static ?string $model = Kelas::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    // Menambahkan grup navigasi
    protected static ?string $navigationGroup = 'Kelas Management';  // Nama grup navigasi

    public static function shouldRegisterNavigation(): bool
       {
           if(auth()->user()->can('view-kelas'))
               return true;
           else
               return false;
       }

   
    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->label('Nama Kelas')
                ->required(),
            TextInput::make('kode_kelas')
                ->label('Kode Kelas')
                ->unique()
                ->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Kelas')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('kode_kelas')
                    ->label('Kode Kelas')
                    ->sortable()
                    ->searchable(),
                
            ])
            ->filters([/* Filter jika diperlukan */])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Tambahkan relasi jika diperlukan
        ];
    }
    

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}


