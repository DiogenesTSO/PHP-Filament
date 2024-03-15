<?php

namespace App\Filament\Resources\PresentesResource\Pages;

use App\Filament\Resources\PresentesResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPresentes extends EditRecord
{
    protected static string $resource = PresentesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
