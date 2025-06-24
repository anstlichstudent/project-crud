<?php

namespace App\Filament\Resources\MahasiswaResource\Pages;

use App\Filament\Resources\MahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use App\Models\Mahasiswa;
use Illuminate\Validation\ValidationException;


class EditMahasiswa extends EditRecord
{
    protected static string $resource = MahasiswaResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeSave(array $data): array
    {
        $nim = $data['fakultas'] . $data['prodi'] . $data['angkatan'] . '1' . str_pad($data['nomor_urut'], 3, '0', STR_PAD_LEFT);
        $exists = Mahasiswa::where('nim', $nim)
            ->where('id', '!=', $this->record->id)
            ->exists();
        if ($exists) {
            Notification::make()
                ->title('NIM sudah terdaftar!')
                ->danger()
                ->send();
            throw ValidationException::withMessages([
                'nomor_urut' => 'NIM sudah terdaftar!',
            ]);
        }
        Notification::make()
            ->title('Data berhasil diubah')
            ->success()
            ->send();
        return $data;
    }
}
