<?php

namespace App\Filament\Resources\TestimoniCustomerResource\Pages;

use App\Filament\Resources\TestimoniCustomerResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTestimoniCustomers extends ManageRecords
{
    protected static string $resource = TestimoniCustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()
                ->label('Tambah Testimoni Baru') // This changes the button label
                ->modalHeading()->label("Tambah Gambar Testimoni") // This changes the modal heading
        ];
    }


}