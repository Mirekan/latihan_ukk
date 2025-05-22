<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PklResource\Pages;
use App\Filament\Resources\PklResource\RelationManagers;
use App\Models\Pkl;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PklResource extends Resource
{
    protected static ?string $model = Pkl::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\Select::make('siswa_id')
                    ->relationship('siswa', 'nama')
                    ->label('Nama Siswa')
                    ->required(),
                Forms\Components\Select::make('guru_id')
                    ->relationship('guru', 'nama')
                    ->label('Nama Guru')
                    ->required(),
                Forms\Components\Select::make('industri_id')
                    ->relationship('industri', 'nama')
                    ->label('Nama Industri')
                    ->required(),
                Forms\Components\DatePicker::make('mulai')
                    ->label('Tanggal Mulai')
                    ->required(),
                Forms\Components\DatePicker::make('selesai')
                    ->label('Tanggal Selesai')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('siswa.nama')
                    ->label('Nama Siswa')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('guru.nama')
                    ->label('Nama Guru')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('industri.nama')
                    ->label('Industri')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('mulai')
                    ->label('Tanggal Mulai')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('selesai')
                    ->label('Tanggal Selesai')
                    ->sortable()
                    ->searchable(),
                // Tables\Columns\TextColumn::make('siswa.status_lapor_pkl')
                //     ->label('Status Lapor PKL')
                //     ->badge(true)
                //     ->formatStateUsing(fn($record): string => $record->status_lapor_pkl == 1 ? 'Lapor' : 'Belum Lapor')
                //     ->color(fn($record): string => $record->status_lapor_pkl == 1 ? 'success' : 'danger'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPkls::route('/'),
            'create' => Pages\CreatePkl::route('/create'),
            'edit' => Pages\EditPkl::route('/{record}/edit'),
        ];
    }
}
