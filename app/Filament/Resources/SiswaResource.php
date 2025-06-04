<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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
                    ->prefixIcon('heroicon-o-envelope')
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
                    ->prefixIcon('heroicon-o-phone')
                    ->prefix('+62')
                    ->required()
                    ->tel()
                    ->dehydrateStateUsing(function ($state) {
                        if (str_starts_with($state, '0')) {
                            return '62' . substr($state, 1);
                        }
                        return $state;
                    })
                    ->afterStateHydrated(function (Forms\Get $get, Forms\Set $set) {
                        $kontak = $get('kontak');
                        if (str_starts_with($kontak, '62')) {
                            $set('kontak', '0' . substr($kontak, 2));
                        }
                    })
                    ->maxLength(255),
                Forms\Components\Select::make('gender')
                    ->required()
                    ->options([
                        "L" => 'Laki-laki',
                        "P" => 'Perempuan',
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
                    ->formatStateUsing(fn($state) => DB::select('SELECT ketGender(?) AS gender', [$state])[0]->gender)
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('kontak')
                    ->label('Kontak')
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
                    Tables\Actions\DeleteBulkAction::make()
                        ->action(function (Collection $records) {
                            $deleteable = $records->filter(function (Siswa $record) {
                                return $record->pkl->isEmpty();
                            });
                            if ($deleteable->isEmpty()) {
                                Notification::make()
                                    ->title('No deletable records')
                                    ->danger()
                                    ->body('None of the selected students can be deleted because they have PKL records.')
                                    ->send();
                                return;
                            }
                            $deleteable->each(function (Siswa $record) {
                                $record->delete();
                            });
                        })
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
