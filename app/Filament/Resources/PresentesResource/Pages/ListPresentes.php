<?php

namespace App\Filament\Resources\PresentesResource\Pages;

use App\Filament\Resources\PresentesResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPresentes extends ListRecords
{
    protected static string $resource = PresentesResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
