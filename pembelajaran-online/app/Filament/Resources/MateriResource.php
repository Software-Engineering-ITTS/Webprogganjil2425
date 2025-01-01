<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use App\Filament\Resources\MateriResource\Pages;
use App\Filament\Resources\MateriResource\RelationManagers;
use App\Models\Materi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MateriResource extends Resource
{
    // Model yang digunakan oleh resource ini
    protected static ?string $model = Materi::class;

    // Ikon navigasi pada sidebar Filament
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    // Menentukan grup navigasi di sidebar
    protected static ?string $navigationGroup = 'Kelas Management';

    // Fungsi untuk menentukan apakah navigasi ini muncul berdasarkan izin pengguna
    public static function shouldRegisterNavigation(): bool
    {
        // Memeriksa apakah pengguna memiliki izin 'view-materi'
        return auth()->user()->can('view-materi');
    }

    // Konfigurasi form untuk CRUD
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Input untuk judul materi
                TextInput::make('judul')
                    ->required()
                    ->label('Judul Materi')
                    ->placeholder('Masukkan judul materi'),

                // Textarea untuk deskripsi materi
                Textarea::make('deskripsi')
                    ->required()
                    ->label('Deskripsi')
                    ->placeholder('Tulis deskripsi materi di sini'),

                // Dropdown untuk memilih kelas terkait
                Select::make('kelas_id')
                    ->relationship('kelas', 'nama')
                    ->label('Kelas')
                    ->required()
                    ->searchable(),
            ]);
    }

    // Konfigurasi tabel untuk daftar data
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom untuk judul materi
                TextColumn::make('judul')
                    ->label('Judul Materi')
                    ->sortable()
                    ->searchable(),

                // Kolom untuk deskripsi materi dengan panjang dibatasi
                TextColumn::make('deskripsi')
                    ->label('Deskripsi')
                    ->limit(50) // Batasi panjang deskripsi
                    ->wrap(),   // Bungkus teks jika panjang

                // Kolom untuk nama kelas terkait
                TextColumn::make('kelas.nama')
                    ->label('Nama Kelas')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                // Filter tambahan dapat ditambahkan di sini
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
            'index' => Pages\ListMateris::route('/'),
            'create' => Pages\CreateMateri::route('/create'),
            'edit' => Pages\EditMateri::route('/{record}/edit'),
        ];
    }
}
