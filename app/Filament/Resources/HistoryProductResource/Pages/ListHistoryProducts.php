<?php

namespace App\Filament\Resources\HistoryProductResource\Pages;

use App\Filament\Resources\HistoryProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListHistoryProducts extends ListRecords
{
    protected static string $resource = HistoryProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
