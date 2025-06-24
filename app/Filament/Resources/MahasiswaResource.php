<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MahasiswaResource\Pages;
use App\Filament\Resources\MahasiswaResource\RelationManagers;
use App\Models\Mahasiswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\TextColumn;

class MahasiswaResource extends Resource
{
    protected static ?string $model = Mahasiswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Database';
    protected static ?string $pluralLabel = 'Database';
    protected static ?string $modelLabel = 'Database';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('fakultas')
                    ->label('Fakultas')
                    ->options([
                        'D' => 'D - Fakultas Teknik',
                    ])
                    ->required(),
                Select::make('prodi')
                    ->label('Prodi')
                    ->options([
                        '121' => '121 - Teknik Informatika',
                    ])
                    ->required(),
                Select::make('angkatan')
                    ->label('Angkatan')
                    ->options([
                        '23' => '23',
                        '24' => '24',
                        '25' => '25',
                    ])
                    ->required(),
                TextInput::make('nomor_urut')
                    ->label('Nomor Urut')
                    ->numeric()
                    ->required(),
                TextInput::make('nama')
                    ->label('Nama')
                    ->required(),
                Select::make('jenis_kelamin')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->required(),
                DatePicker::make('tanggal_lahir')
                    ->label('Tanggal Lahir')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nim')->label('NIM')->searchable(),
                TextColumn::make('nama')->label('Nama')->searchable(),
                TextColumn::make('jenis_kelamin')->label('Jenis Kelamin')->formatStateUsing(fn($state) => $state === 'L' ? 'Laki-laki' : 'Perempuan'),
                TextColumn::make('tanggal_lahir')->label('Tanggal Lahir')->date('d/m/Y'),
                TextColumn::make('umur')->label('Umur'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMahasiswas::route('/'),
            'create' => Pages\CreateMahasiswa::route('/create'),
            'edit' => Pages\EditMahasiswa::route('/{record}/edit'),
        ];
    }
}
