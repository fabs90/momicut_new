<?php

namespace App\Filament\Resources\ImageProductResource\Pages;

use App\Filament\Resources\ImageProductResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateImageProduct extends CreateRecord
{
    protected static string $resource = ImageProductResource::class;

    protected static ?string $title = "Tambah Gambar Produk";
}