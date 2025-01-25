<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Score;
use App\Models\Remidial;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\DB;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\RemidialResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\RemidialResource\RelationManagers;

class RemidialResource extends Resource
{
    protected static ?string $model = Score::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Nilai Remidial';
    protected static ?string $navigationGroup = 'Data Akademik';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->query(
                // Query hanya siswa dengan nilai < 75
                Score::query()->where('score', '<', 75)
            )
            ->columns([
                TextColumn::make('student.name')->label('Nama Siswa'),
                TextColumn::make('subject.name')->label('Mata Pelajaran'),
                TextColumn::make('semester')->label('Semester'),
                TextColumn::make('semester_year')->label('Tahun Ajaran'),
                TextColumn::make('score')->label('Score')
                    ->color(fn($record) => $record->score < 75 ? 'danger' : 'success'),
            ])
            ->filters([
                // Filter berdasarkan mata pelajaran
                SelectFilter::make('subject_id')
                    ->label('Subject')
                    ->relationship('subject', 'name')
                    ->placeholder('Semua Mata Pelajaran'), // Default filter untuk semua mata pelajaran

                // Filter skor terendah
                Filter::make('minimum_score')
                    ->label('Minimum Score')
                    ->form([
                        Forms\Components\TextInput::make('min_score')
                            ->numeric()
                            ->placeholder('e.g., 50')
                            ->label('Minimum Score'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['min_score'])) {
                            $query->where('score', '>=', $data['min_score']);
                        }
                    }),

                // Filter skor tertinggi
                Filter::make('maximum_score')
                    ->label('Maximum Score')
                    ->form([
                        Forms\Components\TextInput::make('max_score')
                            ->numeric()
                            ->placeholder('e.g., 70')
                            ->label('Maximum Score'),
                    ])
                    ->query(function (Builder $query, array $data) {
                        if (!empty($data['max_score'])) {
                            $query->where('score', '<=', $data['max_score']);
                        }
                    }),

                
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
            'index' => Pages\ListRemidials::route('/'),
            'create' => Pages\CreateRemidial::route('/create'),
            'edit' => Pages\EditRemidial::route('/{record}/edit'),
        ];
    }
}
