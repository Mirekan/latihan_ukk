<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';
    protected static ?string $navigationLabel = 'Users';
    protected static ?string $pluralModelLabel = 'Daftar User';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
                Forms\Components\TextInput::make('name')
                    ->label('Name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),
                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->required()
                    ->password()
                    ->minLength(5)
                    ->maxLength(255)
                    ->dehydrated(fn($state) => ! blank($state)),
                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Password Confirmation')
                    ->required()
                    ->password()
                    ->same('password')
                    ->dehydrated(fn($state) => ! blank($state)),
                Forms\Components\Select::make('roles')
                    ->label('Role')
                    ->multiple()
                    ->relationship('roles', 'name')
                    ->preload()
                    ->required()
                    ->searchable()
                    ->options(function (callable $get) {
                        return \Spatie\Permission\Models\Role::all()->pluck('name', 'id');
                    }),
                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->required()
                    ->email()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
                Tables\Columns\TextColumn::make('name')
                    ->label('Name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('Email')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('roles.name')
                    ->label('Role')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
