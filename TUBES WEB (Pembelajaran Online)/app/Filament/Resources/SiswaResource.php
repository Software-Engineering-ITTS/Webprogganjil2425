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
    protected static ?string $model = Siswa::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function canViewAny(): bool
    {
        return auth()->user()->hasRole(['user', 'admin']);
    }

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
                ->maxLength(15)
                ->label('Nomor Telepon')
                ->placeholder('Masukkan nomor telepon siswa'),

            Select::make('kelas_id')
                ->relationship('kelas', 'nama')
                ->label('Kelas')
                ->required()
                ->preload()
                ->reactive()
                ->afterStateUpdated(fn ($set) => $set('materi_id', null)),

                Select::make('materi_id')
                ->label('Materi')
                ->options(function ($get) {
                    $kelasId = $get('kelas_id');
                    if ($kelasId) {
                        $materis = Materi::where('kelas_id', $kelasId)->pluck('judul', 'id');
                        if ($materis->isEmpty()) {
                            return ['' => 'Materi tidak tersedia'];
                        }
                        return $materis;
                    }
                    return ['' => 'Pilih kelas terlebih dahulu']; 
                })
                ->preload()
                ->required()
                ->disabled(fn ($get) => empty($get('kelas_id')))
                ->afterStateUpdated(function ($set, $get) {
                    if (empty($get('kelas_id'))) {
                        $set('materi_id', null);
                    }
                }),
            Select::make('jam_pembelajaran')
                ->label('Jam Pembelajaran')
                ->options([
                    '08:00-09:30' => '08:00 - 09:30',
                    '12:00-14:30' => '12:00 - 14:30',
                    '15:00-17:30' => '15:00 - 17:30',
                    '20:00-22:00' => '20:00 - 22:00',
                ])
                ->required()
                ->placeholder('Pilih jam pembelajaran'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Siswa')->sortable()->searchable(),
                TextColumn::make('email')->label('Email')->sortable()->searchable(),
                TextColumn::make('no_telp')->label('Nomor Telepon')->sortable(),
                TextColumn::make('kelas.nama')->label('Nama Kelas')->sortable()->searchable(),
                TextColumn::make('materi.judul')->label('Materi')->sortable()->searchable(),
                TextColumn::make('jam_pembelajaran')->label('Jam Pembelajaran')->sortable()->searchable(),
                TextColumn::make('created_at')->label('Tanggal Registrasi')->dateTime()->sortable(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->visible(fn () => auth()->user()->hasRole('admin')),
                Tables\Actions\DeleteAction::make()
                    ->visible(fn () => auth()->user()->hasRole('admin')),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole('user');
    }
}
