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
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'User Management'; // Grup menu navigasi

    public static function shouldRegisterNavigation(): bool
    {
        if(auth()->user()->can('view-permission'))
            return true;
        else
            return false;
    }

    public static function form(Form $form): Form
{
    return $form
        ->schema([
            Card::make()
                ->schema([
                    TextInput::make('name')
                        ->required(),
                    
                    TextInput::make('email')
                        ->email()
                        ->required(),
                    
                    TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                        ->dehydrated(fn (?string $state): bool => filled($state))
                        ->required(fn (Page $livewire): bool => $livewire instanceof CreateRecord),
                    
                    Select::make('roles')
                        ->multiple()
                        ->relationship('roles', 'name'),
                ]),
        ]);
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                
                TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                
                BadgeColumn::make('roles.name')
                    ->label('Roles')
                    ->color('primary'),
                
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([
                // Tambahkan filter jika diperlukan
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Relasi tambahan jika ada
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
