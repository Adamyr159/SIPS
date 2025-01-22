<?php

namespace App\Filament\Resources;

use App\Models\Classes;
use Filament\Forms;
use Filament\Tables;
use App\Models\Score;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ClassSubject;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ScoreResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ScoreResource\RelationManagers;

class ScoreResource extends Resource
{
    protected static ?string $model = Score::class;

    protected static ?string $navigationLabel = 'Input Nilai Siswa';
    protected static ?string $navigationGroup = 'Data Akademik';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('teacher_id')
                    ->label('Guru')
                    ->options(Teacher::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('subject_id')
                    ->label('Mata Pelajaran')
                    ->options(Subject::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('class_id')
                    ->label('Kelas')
                    ->options(Classes::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('student_id')
                    ->label('Siswa')
                    ->options(Student::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('semester')
                    ->label('Semester')
                    ->options([
                        1 => 'Semester 1',
                        2 => 'Semester 2',
                    ])
                    ->required(),
                TextInput::make('semester_year')
                    ->label('Tahun Ajaran')
                    ->numeric()
                    ->minValue(2000)
                    ->maxValue(9999)
                    ->required(),
                TextInput::make('score')
                    ->label('Nilai')
                    ->numeric()
                    ->minValue(0)
                    ->maxValue(100)
                    ->required()
                    ->reactive()
                    ->live()
                    ->afterStateUpdated(function ($state, callable $set) {
                        // Hitung weight berdasarkan score yang dimasukkan
                        $set('weight', self::calculateWeight($state));
                    }),
                TextInput::make('weight')
                    ->label('Predikat')
                    ->readonly()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher.name')->label('Guru')->searchable(),
                TextColumn::make('subject.name')->label('Mata Pelajaran')->searchable(),
                TextColumn::make('classes.name')->label('Kelas')->searchable(),
                TextColumn::make('student.name')->label('Siswa')->searchable(),
                TextColumn::make('score')->label('Nilai')->searchable(),
                TextColumn::make('weight')->label('Predikat')->searchable(),
                TextColumn::make('semester')->label('semester')->searchable(),
                TextColumn::make('semester_year')->label('Tahun')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListScores::route('/'),
            'create' => Pages\CreateScore::route('/create'),
            'edit' => Pages\EditScore::route('/{record}/edit'),
        ];
    }

    // Hook untuk menghitung dan menyimpan weight sebelum create
    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['weight'] = self::calculateWeight($data['score']);
        return $data;
    }

    // Hook untuk menghitung dan menyimpan weight sebelum update/save
    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['weight'] = self::calculateWeight($data['score']);
        return $data;
    }

    private static function calculateWeight($score): string
    {
        if ($score >= 85 && $score <= 100) return 'A';
        if ($score >= 76 && $score <= 84) return 'B';
        if ($score >= 64 && $score <= 75) return 'C';
        if ($score >= 50 && $score <= 63) return 'D';
        if ($score >= 0 && $score <= 49) return 'E';

        // Jika nilai di luar rentang 0-100
        return 'nilai diluar rentang';
    }
}
