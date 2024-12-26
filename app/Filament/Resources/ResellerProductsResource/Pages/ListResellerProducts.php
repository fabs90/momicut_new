<?php

namespace App\Filament\Resources\ResellerProductsResource\Pages;

use App\Filament\Resources\ResellerProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListResellerProducts extends ListRecords
{
    protected static string $resource = ResellerProductsResource::class;


    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label("Buat Data Produk Reseller"),
        ];
    }
}