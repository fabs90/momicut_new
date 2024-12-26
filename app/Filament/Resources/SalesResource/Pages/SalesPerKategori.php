<?php

namespace App\Filament\Resources\SalesResource\Pages;

use App\Filament\Resources\SalesResource;
use App\Models\Sales;
use App\Models\Category;
use Filament\Resources\Pages\Page;
use AymanAlhattami\FilamentPageWithSidebar\Traits\HasPageSidebar;
use Filament\Pages\Actions;
class SalesPerKategori extends Page
{
    protected static ?string $title = "Sales Per-Kategori";
    protected static string $resource = SalesResource::class;
    protected static string $view = 'filament.resources.sales-resource.pages.sales-per-kategori';

    public $category;

    // Load data in the mount method
    public function mount()
    {
        $this->category = Category::all();
    }


}