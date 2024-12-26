<?php

namespace App\Filament\Resources\HistoryProductResource\Pages;

use App\Filament\Resources\HistoryProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHistoryProduct extends EditRecord
{
    protected static string $resource = HistoryProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
