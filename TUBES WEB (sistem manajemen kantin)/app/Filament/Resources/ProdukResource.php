<?php

namespace App\Filament\Resources;

use App\Models\Produk;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\NumberInput;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\ProdukResource\Pages;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?string $navigationGroup = 'Manajemen Kantin';

    // Pastikan menggunakan Filament\Forms\Form dan Filament\Forms\Components
    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                // Gunakan TextInput dari Filament Forms
                TextInput::make('nama')
                    ->required()
                    ->label('Nama Produk')
                    
                    ->placeholder('Masukkan nama produk'),

                TextInput::make('kategori')
                    ->required()
                    ->label('Kategori')
                    ->placeholder('Masukkan kategori produk'),

                // Gunakan NumberInput untuk input angka
                TextInput::make('harga')
                    ->required()
                    ->label('Harga')
                    ->numeric() // Menjamin hanya angka yang bisa dimasukkan
                    ->minValue(0) // Menambahkan batas minimal nilai
                    ->placeholder('Masukkan harga produk'),

                TextInput::make('stok')
                    ->required()
                    ->label('Stok')
                    ->numeric() // Menjamin hanya angka yang bisa dimasukkan
                    ->minValue(0) // Menambahkan batas minimal nilai
                    ->placeholder('Masukkan jumlah stok'),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Produk')->sortable()->searchable(),
                TextColumn::make('kategori')->label('Kategori')->sortable()->searchable(),
                TextColumn::make('harga')->label('Harga')->sortable(),
                TextColumn::make('stok')->label('Stok')->sortable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Dibuat')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                // Tanggal update
                TextColumn::make('updated_at')
                    ->label('Terakhir Diperbarui')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
            // ->bulkActions([
            //     Tables\Actions\DeleteBulkAction::make(),
            // ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
