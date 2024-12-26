<?php

namespace App\Filament\Resources\ImageProductResource\Pages;

use App\Filament\Resources\ImageProductResource;
use App\Models\ImageProduct;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class EditImageProduct extends EditRecord
{
    protected static string $resource = ImageProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }


}