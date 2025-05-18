<?php
namespace App\Filament\Resources\IndustriResource\Pages;

use App\Filament\Resources\IndustriResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
use App\Models\Industri;

class CreateIndustri extends CreateRecord
{
    protected static string $resource = IndustriResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        // Cek apakah nama industri sudah ada di database
        if (Industri::where('nama', $data['nama'])->exists()) {
            Notification::make()
                ->title('Industri sudah ada.')
                ->warning()
                ->send();

            $this->halt(); // Menghentikan proses tanpa menyimpan data baru
        }

        return $data;
    }
}
