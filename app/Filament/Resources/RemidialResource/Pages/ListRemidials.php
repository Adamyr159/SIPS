<?php

namespace App\Filament\Resources\RemidialResource\Pages;

use App\Filament\Resources\RemidialResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRemidials extends ListRecords
{
    protected static string $resource = RemidialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
