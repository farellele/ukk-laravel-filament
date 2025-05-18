<?php
namespace App\Filament\Resources\PKLResource\Pages;

use App\Filament\Resources\PKLResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\PKL;

class CreatePKL extends CreateRecord
{
    protected static string $resource = PKLResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Cek apakah siswa sudah memiliki PKL
        if (PKL::where('siswa_id', $data['siswa_id'])->exists()) {
            Notification::make()
                ->title('Siswa sudah mengisi PKL.')
                ->warning()
                ->send();

            $this->halt(); // Menghentikan proses tanpa menyimpan data baru
        }

        return $data;
    }
}