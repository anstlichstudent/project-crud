<?php

namespace App\Filament\Resources\MahasiswaResource\Pages;

use App\Filament\Resources\MahasiswaResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Mahasiswa;
use Illuminate\Validation\ValidationException;

class CreateMahasiswa extends CreateRecord
{
    protected static string $resource = MahasiswaResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $nim = $data['fakultas'] . $data['prodi'] . $data['angkatan'] . '1' . str_pad($data['nomor_urut'], 3, '0', STR_PAD_LEFT);
        if (Mahasiswa::where('nim', $nim)->exists()) {
            Notification::make()
                ->title('NIM sudah terdaftar!')
                ->danger()
                ->send();
            throw ValidationException::withMessages([
                'nomor_urut' => 'NIM sudah terdaftar!',
            ]);
        }
        return $data;
    }

    public function mount(): void
    {
        parent::mount();
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            abort(403);
        }
    }
}
