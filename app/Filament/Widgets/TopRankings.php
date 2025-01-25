<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class TopRankings extends ChartWidget
{
    protected static ?string $heading = 'Top Rankings';

    protected function getData(): array
    {
        // Ambil data siswa terbaik berdasarkan rata-rata nilai
        $topStudents = DB::table('scores')
            ->join('students', 'scores.student_id', '=', 'students.id')
            ->where('scores.semester_year', 2024) // Filter untuk tahun akademik tertentu
            ->select(
                'students.name as student_name',
                'scores.semester_year',
                'scores.semester',
                DB::raw('AVG(scores.score) as average_score') // Hitung rata-rata nilai
            )
            ->groupBy('students.id', 'students.name', 'scores.semester_year', 'scores.semester') // Tambahkan grouping untuk semester dan tahun
            ->orderByDesc('average_score') // Urutkan berdasarkan rata-rata tertinggi
            ->get();

        // Menyaring siswa yang sudah juara (pertama kali tampil dalam tahun yang sama)
        $uniqueTopStudents = collect();
        foreach ($topStudents as $student) {
            if (!$uniqueTopStudents->contains('student_name', $student->student_name)) {
                $uniqueTopStudents->push($student);
            }
        }

        // Ambil hanya 3 siswa terbaik
        $topStudentsFiltered = $uniqueTopStudents->take(3);

        // Format data untuk chart
        $labels = $topStudentsFiltered->map(function ($student) {
            return $student->student_name . " (" . $student->semester_year . ")";
        })->toArray(); // Label format: "Nama Siswa (Sem X - Tahun)"

        $data = $topStudentsFiltered->pluck('average_score')->toArray(); // Rata-rata nilai untuk data

        return [
            'datasets' => [
                [
                    'label' => 'Average Score',
                    'data' => $data,
                ],
            ],
            'labels' => $labels,
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
