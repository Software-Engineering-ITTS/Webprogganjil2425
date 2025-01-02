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
    protected static ?string $model = Materi::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Kelas Management';

    public static function shouldRegisterNavigation(): bool
    {
        return auth()->user()->can('view-materi');
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('judul')
                ->required()
                ->label('Judul Materi')
                ->placeholder('Masukkan judul materi'),
            Textarea::make('deskripsi')
                ->required()
                ->label('Deskripsi')
                ->placeholder('Tulis deskripsi materi di sini'),
            Select::make('kelas_id')
                ->relationship('kelas', 'nama')
                ->label('Kelas')
                ->required()
                ->preload()
                ->searchable(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            TextColumn::make('judul')
                ->label('Judul Materi')
                ->sortable()
                ->searchable(),
            TextColumn::make('deskripsi')
                ->label('Deskripsi')
                ->limit(50)
                ->wrap(),
            TextColumn::make('kelas.nama')
                ->label('Nama Kelas')
                ->sortable()
                ->searchable(),
        ])
        ->filters([])
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
            'index' => Pages\ListMateris::route('/'),
            'create' => Pages\CreateMateri::route('/create'),
            'edit' => Pages\EditMateri::route('/{record}/edit'),
        ];
    }
}
