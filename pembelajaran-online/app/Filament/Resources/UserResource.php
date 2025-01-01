<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form; 
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Resources\Pages\CreateRecord;
use Filament\Pages\Page;

class UserResource extends Resource
{
    // Model yang digunakan oleh resource ini
    protected static ?string $model = User::class;

    // Ikon navigasi pada sidebar Filament
    protected static ?string $navigationIcon = 'heroicon-o-user';

    // Grup menu navigasi di sidebar
    protected static ?string $navigationGroup = 'User Management';


    // Konfigurasi form untuk CRUD
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()
                    ->schema([
                        // Input untuk nama pengguna
                        TextInput::make('name')
                            ->required(),

                        // Input untuk email pengguna
                        TextInput::make('email')
                            ->email()
                            ->required(),

                        // Input untuk password pengguna
                        TextInput::make('password')
                            ->password()
                            ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                            ->dehydrated(fn (?string $state): bool => filled($state))
                            ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord),

                        // Dropdown untuk memilih role pengguna
                        Select::make('roles')
                            ->multiple()
                            ->relationship('roles', 'name'),
                    ]),
            ]);
    }

    // Konfigurasi tabel untuk daftar data pengguna
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kolom untuk nama pengguna
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                // Kolom untuk email pengguna
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),

                // Kolom untuk role pengguna dengan badge
                BadgeColumn::make('roles.name')
                    ->label('Roles')
                    ->color('primary'),

                // Kolom untuk tanggal pembuatan akun
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                // Aksi edit dan hapus
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
