<?php

namespace App\Filament\Resources;

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
                    ->options(ClassSubject::all()->pluck('name', 'id'))
                    ->required(),
                Select::make('student_id')
                    ->label('Siswa')
                    ->options(Student::all()->pluck('name', 'id'))
                    ->required(),
                TextInput::make('score')
                    ->label('Nilai')
                    ->numeric()
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('teacher.name')->label('Guru')->searchable(),
                TextColumn::make('subject.name')->label('Mata Pelajaran')->searchable(),
                TextColumn::make('class.name')->label('Kelas')->searchable(),
                TextColumn::make('student.name')->label('Siswa')->searchable(),
                TextColumn::make('score')->label('Nilai')->searchable(),
                TextColumn::make('created_at')->label('Tanggal')->date()->searchable(),
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
}
