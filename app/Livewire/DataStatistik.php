<?php
namespace App\Filament\Widgets;

use App\Models\Siswa;
use App\Models\Industri;
use App\Models\Guru;
use Filament\Widgets\Widget;

class DataStatistikWidget extends Widget
{
    protected static ?string $heading = 'Data Statistik';

    protected function getViewData(): array
    {
        return [
            'totalSiswa' => Siswa::count(),
            'totalIndustri' => Industri::count(),
            'totalGuru' => Guru::count(),
        ];
    }

    protected static string $view = 'filament.widgets.data-statistik';
}
