<?php
namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Industri;

class Aji extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Siswa', Siswa::count())
                ->description('Jumlah total siswa')
                ->color('primary')
                ->icon('heroicon-o-user-group'), // Tambahkan ikon

            Stat::make('Total Guru', Guru::count())
                ->description('Jumlah total guru')
                ->color('success')
                ->icon('heroicon-o-academic-cap'), //Tambahkan ikon

            Stat::make('Total Industri', Industri::count())
                ->description('Jumlah total industri')
                ->color('warning')
                ->icon('heroicon-o-building-office'), //Tambahkan ikon
        ];
    }
}
