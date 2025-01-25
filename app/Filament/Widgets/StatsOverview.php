<?php

namespace App\Filament\Widgets;

use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Filament\Tables\Table;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Support\Enums\IconPosition;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class StatsOverview extends BaseWidget
{

    protected function getStats(): array
    {
        return [
            Stat::make('Jumlah Guru', Teacher::count()),
            Stat::make('Jumlah Siswa', Student::count()),
            Stat::make('Jumlah Kelas', Classes::count()),
            Stat::make('Jumlah Mata Pelajaran', Subject::count()),
        ];
    }
}
