<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationLabel = 'Siswa';
    protected static ?string $pluralModelLabel = 'Daftar Siswa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('nama')
                    ->label('Nama Siswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email Siswa')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('nis')
                    ->label('NIS Siswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('alamat')
                    ->label('Alamat Siswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('kontak')
                    ->label('Kontak Siswa')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('gender')
                    ->required()
                    ->options([
                        'male' => 'Male',
                        'female' => 'Female',
                    ]),
                Forms\Components\FileUpload::make('foto')
                    ->label('Upload Foto Siswa')
                    ->image()
                    ->disk('public')
                    ->directory('siswa')
                    ->preserveFilenames()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('nis')
                    ->label('NIS')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\IconColumn::make('status_lapor_pkl')
                    ->label('Status Lapor PKL')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle'),
                Tables\Columns\TextColumn::make('gender')
                    ->label(label: 'Gender')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->label('Hapus')
                    ->action(function (Siswa $record) {
                        $record->delete();
                        return redirect()->route('filament.resources.siswas.index');
                    })
                    ->color('danger')
                    ->requiresConfirmation(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
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
