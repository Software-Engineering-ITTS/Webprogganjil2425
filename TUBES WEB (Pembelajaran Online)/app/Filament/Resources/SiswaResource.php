<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Materi;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;

class SiswaResource extends Resource
{
    // Menetapkan model yang digunakan oleh resource ini (Siswa)
    protected static ?string $model = Siswa::class;

    // Menentukan ikon navigasi untuk resource ini
    protected static ?string $navigationIcon = 'heroicon-o-users';

    // Menentukan grup navigasi yang digunakan dalam panel admin
    protected static ?string $navigationGroup = 'Siswa Management';

    // Menentukan hak akses pada navigasi
    public static function canViewAny(): bool
    {
        // Memastikan hanya pengguna dengan role "user" dan "admin" yang dapat melihat resource ini
        return auth()->user()->hasRole(['user', 'admin']);
    }

    // Form untuk membuat atau mengedit siswa
    public static function form(Form $form): Form
    {
        return $form->schema([
            // Input untuk nama siswa
            TextInput::make('nama')
                ->required() // Wajib diisi
                ->label('Nama Lengkap')
                ->placeholder('Masukkan nama lengkap siswa'),

            // Input untuk email siswa
            TextInput::make('email')
                ->email() // Validasi format email
                ->required() // Wajib diisi
                ->unique(ignoreRecord: true) // Pastikan email unik
                ->label('Email')
                ->placeholder('Masukkan email siswa'),

            // Input untuk nomor telepon siswa
            TextInput::make('no_telp')
                ->tel() // Validasi nomor telepon
                ->maxLength(15) // Batas panjang maksimal 15 karakter
                ->label('Nomor Telepon')
                ->placeholder('Masukkan nomor telepon siswa'),

            // Select untuk memilih kelas
            Select::make('kelas_id')
                ->relationship('kelas', 'nama') // Menampilkan relasi kelas dengan nama
                ->label('Kelas')
                ->required() // Wajib diisi
                ->preload() // Memuat data sebelumnya untuk performa yang lebih baik
                ->searchable() // Memungkinkan pencarian
                ->reactive() // Membuat field materi bereaksi saat kelas diubah
                ->afterStateUpdated(fn ($set) => $set('materi_id', null)), // Reset materi jika kelas diubah

            // Select untuk memilih materi
            Select::make('materi_id')
                ->label('Materi')
                ->relationship('kelas.materis', 'judul') // Menampilkan materi berdasarkan kelas
                ->preload() // Memuat data materi sebelumnya
                ->required() // Wajib diisi
                ->searchable() // Memungkinkan pencarian
                ->disabled(fn ($get) => empty($get('kelas_id'))) // Disable jika kelas belum dipilih
                ->afterStateUpdated(function ($set, $get) {
                    if (empty($get('kelas_id'))) {
                        $set('materi_id', null); // Reset materi jika kelas kosong
                    }
                }),
        ]);
    }

    // Menentukan tampilan tabel untuk menampilkan data siswa
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom untuk menampilkan nama siswa
                TextColumn::make('nama')->label('Nama Siswa')->sortable()->searchable(),
                
                // Kolom untuk menampilkan email siswa
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                
                // Kolom untuk menampilkan nomor telepon siswa
                TextColumn::make('no_telp')->label('Nomor Telepon')->sortable(),
                
                // Kolom untuk menampilkan nama kelas
                TextColumn::make('kelas.nama')->label('Nama Kelas')->sortable()->searchable(),
                
                // Kolom untuk menampilkan judul materi
                TextColumn::make('materi.judul')->label('Materi')->sortable()->searchable(),
                
                // Kolom untuk menampilkan tanggal registrasi siswa
                TextColumn::make('created_at')->label('Tanggal Registrasi')->dateTime()->sortable(),
            ])
            ->filters([
                // Filter berdasarkan kelas
                SelectFilter::make('kelas_id')
                    ->label('Kelas')
                    ->options(Kelas::pluck('nama', 'id')->toArray()),

                // Filter berdasarkan materi
                SelectFilter::make('materi_id')
                    ->label('Materi')
                    ->options(Materi::pluck('judul', 'id')->toArray()),
            ])
            ->actions([
                // Aksi edit hanya untuk admin
                Tables\Actions\EditAction::make()
                    ->visible(fn () => auth()->user()->hasRole('admin')), // Hanya admin yang bisa mengedit
                
                // Aksi hapus hanya untuk admin
                Tables\Actions\DeleteAction::make()
                    ->visible(fn () => auth()->user()->hasRole('admin')), // Hanya admin yang bisa menghapus
            ]);
    }

    // Menentukan halaman-halaman yang tersedia dalam resource ini
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'), // Halaman utama untuk daftar siswa
            'create' => Pages\CreateSiswa::route('/create'), // Halaman untuk membuat siswa baru
            'edit' => Pages\EditSiswa::route('/{record}/edit'), // Halaman untuk mengedit siswa
        ];
    }

    // Menentukan apakah role tertentu dapat mengakses halaman create
    public static function canCreate(): bool
    {
        // Hanya pengguna dengan role "user" yang dapat menambah siswa
        return auth()->user()->hasRole('user');
    }
}
