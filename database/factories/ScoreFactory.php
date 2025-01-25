<?php

namespace Database\Factories;

use App\Models\Score;
use App\Models\Classes;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Score::class;
    public function definition(): array
    {
        return [
            'teacher_id' => Teacher::inRandomOrder()->value('id'), // Ambil id secara acak dari tabel teachers
            'subject_id' => Subject::inRandomOrder()->value('id'), // Ambil id secara acak dari tabel subjects
            'class_id' => Classes::inRandomOrder()->value('id'), // Ambil id secara acak dari tabel classes
            'student_id' => Student::inRandomOrder()->value('id'), // Ambil id secara acak dari tabel students
            'score' => $this->faker->numberBetween(60, 100), // Skor 60-100
            'semester' => $this->faker->numberBetween(1, 2), // Semester 1 atau 2
            'semester_year' => $this->faker->numberBetween(2020, 2025), // Tahun di atas 2024
            // 'weight' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']), // Bobot
        ];
    }
}
