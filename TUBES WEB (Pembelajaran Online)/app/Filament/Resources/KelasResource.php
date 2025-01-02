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
    // Model yang digunakan oleh resource ini
    protected static ?string $model = Kelas::class;

    // Ikon navigasi pada sidebar Filament
    protected static ?string $navigationIcon = 'heroicon-o-book-open';

    // Menentukan grup navigasi di sidebar
    protected static ?string $navigationGroup = 'Kelas Management';

    // Fungsi untuk menentukan apakah navigasi ini muncul berdasarkan izin pengguna
    public static function shouldRegisterNavigation(): bool
    {
        // Memeriksa apakah pengguna memiliki izin 'view-kelas'
        return auth()->user()->can('view-kelas');
    }

    // Konfigurasi form untuk CRUD
    public static function form(Form $form): Form
    {
        return $form->schema([
            // Input untuk nama kelas
            TextInput::make('nama')
                ->label('Nama Kelas')
                ->required(),

            // Input untuk kode kelas yang unik
            TextInput::make('kode_kelas')
                ->label('Kode Kelas')
                ->unique()
                ->required(),
        ]);
    }

    // Konfigurasi tabel untuk daftar data
    public static function table(Table $table): Table
    {
        return $table->columns([
            // Kolom untuk nama kelas
            TextColumn::make('nama')
                ->label('Nama Kelas')
                ->sortable()
                ->searchable(),

            // Kolom untuk kode kelas
            TextColumn::make('kode_kelas')
                ->label('Kode Kelas')
                ->sortable()
                ->searchable(),
        ])
        ->actions([
            // Aksi edit dan hapus
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            // Aksi hapus massal
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        // Relasi tambahan dapat ditambahkan di sini
        return [];
    }

    public static function getPages(): array
    {
        // Mendefinisikan rute untuk halaman-halaman resource ini
        return [
            'index' => Pages\ListKelas::route('/'),
            'create' => Pages\CreateKelas::route('/create'),
            'edit' => Pages\EditKelas::route('/{record}/edit'),
        ];
    }
}

// ... Comments continue for other resources ...
