<?php

namespace App\Filament\Resources\ResellerProfileResource\Pages;

use App\Filament\Resources\ResellerProfileResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateResellerProfile extends CreateRecord
{
    protected static string $resource = ResellerProfileResource::class;

    protected static ?string $title = "Tambah Data Reseller";

}