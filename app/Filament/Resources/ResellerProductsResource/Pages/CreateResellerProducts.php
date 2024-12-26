<?php

namespace App\Filament\Resources\ResellerProductsResource\Pages;

use App\Filament\Resources\ResellerProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateResellerProducts extends CreateRecord
{
    protected static string $resource = ResellerProductsResource::class;

    protected static ?string $title = "Tambah Data Produk Reseller";

}