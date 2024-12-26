<?php
namespace App\Filament\Resources\SalesResource\Pages;

use App\Filament\Resources\SalesResource;
use App\Livewire\DetailProductSalesStats;
use App\Models\Sales;
use Filament\Forms\Form;
use Filament\Resources\Pages\Page;
use App\Models\Product;
use Filament\Tables;
use Filament\Forms\Components\DatePicker;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\Filter;

class DetailProductSales extends Page implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected static string $resource = SalesResource::class;
    protected static string $view = 'filament.resources.sales-resource.pages.detail-product-sales';

    public $product;
    public $totalRevenue;

    public function mount($product)
    {
        $this->product = Product::findOrFail($product);
        $this->totalRevenue = Sales::where('product_id', $product)
            ->groupBy('product_id')
            ->selectRaw('MAX(sales.pendapatan) as top_revenue')
            ->get()
            ->sum('top_revenue');
    }

    public function getTableRecordKey($record): string
    {
        return (string) $record->id;
    }

    // Define query
    protected function getTableQuery()
    {
        $query = Sales::where('product_id', $this->product->id);

        return $query->orderByDesc('pendapatan');
    }

    // Define the columns of the table
    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('product.nama')
                ->numeric()
                ->sortable()
                ->searchable(),
            Tables\Columns\TextColumn::make('stok_terjual')
                ->numeric()
                ->sortable(),
            Tables\Columns\TextColumn::make('pendapatan')
                ->label('Pendapatan')
                ->money("IDR")
                ->searchable()
                ->sortable(),
            Tables\Columns\TextColumn::make('created_at')
                ->label("Tanggal")
                ->sortable()
                ->searchable()
                ->dateTime(),
        ];
    }

    // Define table filters
    protected function getTableFilters(): array
    {
        return [
            Filter::make('Tanggal')
                ->form([
                    DatePicker::make('startDate')
                        ->label('Dari')
                        ->reactive()
                        ->afterStateUpdated(fn($state) => $this->startDate = $state),  // Mengatur nilai startDate
                    DatePicker::make('endDate')
                        ->label('Hingga')
                        ->reactive()
                        ->afterStateUpdated(fn($state) => $this->endDate = $state),  // Mengatur nilai endDate
                ])
        ];
    }

}