<?php

namespace App\Filament\Resources\ImageProductResource\Pages;

use App\Filament\Resources\ImageProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImageProducts extends ListRecords
{
    protected static string $resource = ImageProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label("Tambah Gambar"),
        ];
    }
}