<?php

namespace App\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
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
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    // Menambahkan grup navigasi
    protected static ?string $navigationGroup = 'Siswa Management';  // Nama grup navigasi

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('nama')
                ->required()
                ->label('Nama Lengkap')
                ->placeholder('Masukkan nama lengkap siswa'),

            TextInput::make('email')
                ->email()
                ->required()
                ->unique(ignoreRecord: true)
                ->label('Email')
                ->placeholder('Masukkan email siswa'),

            TextInput::make('no_telp')
                ->tel()
                ->maxLength(15) // Menambahkan batas maksimal untuk panjang nomor telepon
                ->label('Nomor Telepon')
                ->placeholder('Masukkan nomor telepon siswa'),

            Select::make('kelas_id')
                ->relationship('kelas', 'nama')
                ->label('Kelas')
                ->required()
                ->searchable()
                ->reactive()
                ->afterStateUpdated(fn ($set) => $set('materi_id', null)),

            Select::make('materi_id')
                ->label('Materi')
                ->relationship('kelas.materis', 'judul')
                ->required()
                ->searchable()
                ->disabled(fn ($get) => empty($get('kelas_id')))
                ->afterStateUpdated(function ($set, $get) {
                    if (empty($get('kelas_id'))) {
                        $set('materi_id', null);
                    }
                }),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('no_telp')
                    ->label('Nomor Telepon')
                    ->sortable(),
                TextColumn::make('kelas.nama')
                    ->label('Nama Kelas')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('materi.judul')
                    ->label('Materi')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Tanggal Registrasi')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([
                // Menambahkan filter untuk kelas dan materi
                SelectFilter::make('kelas_id')
                    ->label('Kelas')
                    ->options(Kelas::pluck('nama', 'id')->toArray()),  // Menampilkan daftar kelas
                SelectFilter::make('materi_id')
                    ->label('Materi')
                    ->options(Materi::pluck('judul', 'id')->toArray()),  // Menampilkan daftar materi
            ])
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }
}
