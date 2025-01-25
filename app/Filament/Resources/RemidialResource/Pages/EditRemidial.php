<?php

namespace App\Filament\Resources\RemidialResource\Pages;

use App\Filament\Resources\RemidialResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRemidial extends EditRecord
{
    protected static string $resource = RemidialResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
