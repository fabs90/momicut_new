<?php

use App\Filament\Resources\SalesResource\Pages\ProductSalesPerCategory;
use App\Http\Controllers\CustomerReviewController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PageController;
use App\Models\CustomerReview;
use App\Models\Product;
use App\Models\Promo;
use App\Models\Category;
use App\Models\TestimoniCustomer;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {

    $testimonials = CustomerReview::all();
    $testimoniCustomer = TestimoniCustomer::all();
    $categories = Category::all();
    $products = Product::all()->groupBy('category_id');

    return view('landing.homeContent', compact(
        'testimonials',
        'testimoniCustomer',
        'categories',
        'products'
    ));
});

Route::get('/menu/{slug}', [MenuController::class, 'showSpecificMenu'])->name('showMenu');

Route::get('/promosi', function () {
    $promosi = Promo::all();

    return view('promosi.promosiContent', compact('promosi'));
})->name('promosi');

// Route untuk menampilkan produk berdasarkan kategori
// Route::get('/sales/kategori/{category}', [PageController::class, 'productsByCategory'])->name('sales.productsByCategory');

// Route::get('sales/laporan/kategori/{category}', [ProductSalesPerCategory::class, 'render'])->name('sales.productsByCategory');


Route::post('/post/customer-review', [CustomerReviewController::class, 'store'])->name('customer.review.store');