@extends('landing.layouts.master')

{{--
CONTOH BOX PRODUK
@section('produkSambal')
    @foreach ($productsByCategorySambal as $item)
        <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
            <div class="card shadow-lg h-100 text-center p-3"
                style="border-radius: 20px; box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);">
                <div class="d-flex justify-content-center align-items-center">
                    @if ($item->primaryImage)
                        <img src="{{ asset('storage/' . $item->primaryImage->image) }}" alt="{{ $item->nama }}"
                            class="img-fluid mb-3" style="max-width: 60%; height: auto; border-radius: 10px;">
                    @else
                        <p>No primary image available</p>
                    @endif
                </div>
                <h4>{{ $item->nama }}</h4>
                <div class="d-flex justify-content-center w-100 px-3">
                    <span class="text-primary me-3">@currency($item->harga)</span>
                    <span class="text-body text-decoration-line-through">@currency($item->harga + 5000)</span>
                </div>
                <a href="https://wa.me/6281234567890?text=Saya%20ingin%20memesan%20{{ $item->nama }}%20apakah%20tersedia?"
                    class="btn btn-success rounded-pill btn-sm d-flex justify-content-center align-items-center text-center mt-3">
                    <i class="fab fa-whatsapp me-2"></i>Pesan Disini
                </a>
            </div>
        </div>
    @endforeach
@endsection
 --}}

 @section('produkKategoriLain')
 @foreach ($categories as $item)
     <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="minumanrempah">
         <div class="container py-5">
             <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                 <h5 class="fw-bold text-primary text-uppercase">Produk Kami</h5>
                 <h1 class="mb-0">Kategori {{ $item->kategori }}</h1>
             </div>
             <div class="row g-4">
                 @if (isset($products[$item->id]) && $products[$item->id]->isNotEmpty())
                     @foreach ($products[$item->id]->take(3) as $product)
                         {{-- Ambil 3 produk --}}
                         <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.3s">
                             <div class="card shadow-lg h-100 text-center p-3"
                                 style="border-radius: 20px; box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);">
                                 <div class="d-flex justify-content-center align-items-center">
                                     <!-- Carousel Start -->
                                     <div id="carouselExample{{ $product->id }}" class="carousel slide"
                                         data-bs-ride="carousel" data-bs-interval="3000">
                                         <div class="carousel-inner">
                                             @if ($product->primaryImage)
                                                 <div class="carousel-item active">
                                                     <img src="{{ asset('storage/' . $product->primaryImage->image) }}"
                                                         alt="{{ $product->nama }}" class="d-block w-100 img-fluid mb-3"
                                                         style="border-radius: 10px; max-height: 300px; object-fit: cover;">
                                                 </div>
                                             @endif

                                             @foreach ($product->images as $key => $image)
                                                 @if (!$product->primaryImage || $product->primaryImage->id !== $image->id)
                                                     <div
                                                         class="carousel-item {{ !$product->primaryImage && $key == 0 ? 'active' : '' }}">
                                                         <img src="{{ asset('storage/' . $image->image) }}"
                                                             alt="{{ $product->nama }}" class="d-block w-100 img-fluid mb-3"
                                                             style="border-radius: 10px; max-height: 300px; object-fit: cover;">
                                                     </div>
                                                 @endif
                                             @endforeach
                                         </div>

                                         <button class="carousel-control-prev" type="button"
                                             data-bs-target="#carouselExample{{ $product->id }}" data-bs-slide="prev">
                                             <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                             <span class="visually-hidden">Previous</span>
                                         </button>
                                         <button class="carousel-control-next" type="button"
                                             data-bs-target="#carouselExample{{ $product->id }}" data-bs-slide="next">
                                             <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                             <span class="visually-hidden">Next</span>
                                         </button>
                                     </div>
                                     <!-- Carousel End -->
                                 </div>
                                 <h4>{{ $product->nama }}</h4>
                                 <div class="d-flex justify-content-center w-100 px-3">
                                     <span class="text-primary me-3">@currency($product->harga)</span>
                                 </div>
                                 <div class="px-3 mt-2">
                                    <p class="text-primary">{{ $product->deskripsi }}</p>
                                </div>
                                 <a href="https://wa.me/6281234567890?text=Saya%20ingin%20memesan%20{{ $product->nama }}%20apakah%20tersedia?"
                                     class="btn btn-success rounded-pill btn-sm d-flex justify-content-center align-items-center text-center mt-3">
                                     <i class="fab fa-whatsapp me-2"></i>Pesan Disini
                                 </a>
                             </div>
                         </div>
                     @endforeach
                     <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.9s"></div>
                 @else
                     <div class="col-12 text-center">
                         <p>Produk tidak tersedia untuk kategori ini.</p>
                     </div>
                 @endif
                 <!-- Lihat Lebih Banyak -->
                 <div class="col-lg-4 col-md-6 wow slideInUp" data-wow-delay="0.9s">
                     <div class="card shadow-lg h-100 text-center p-3"
                         style="border-radius: 20px; box-shadow: 0px 10px 30px rgba(0, 0, 0, 0.1);">
                         <h1>Klik menu lain untuk melihat</h1>
                         <a href="{{ route('showMenu', ['slug' => $item->slug]) }}"
                             class="btn btn-success rounded-pill btn-sm d-flex justify-content-center align-items-center text-center">
                             Menu lain
                         </a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 @endforeach
@endsection



@section('testimoniCarousel')
    <div class="carousel-item active">
        <img src="{{ asset('personal/img/fotowa.jpeg') }}" class=" d-block mx-auto w-75" alt="Review Foto 1">
    </div>
    @foreach ($testimoniCustomer as $item)
        <div class="carousel-item">
            <img src="{{ asset('storage/' . $item->image) }}" class=" d-block mx-auto w-75" alt="Review Foto">
        </div>
    @endforeach
@endsection


@section('testimonial')
    @foreach ($testimonials as $item)
        <div class="testimonial-item bg-light my-4">
            <div class="d-flex align-items-center border-bottom pt-5 pb-4 px-5">
                <img class="img-fluid rounded" src="{{ asset('personal') }}/img/testimonial-1.jpg"
                    style="width: 60px; height: 60px;">
                <div class="ps-4">
                    <h4 class="text-primary mb-1">{{ $item->username }}</h4>
                    <small class="text-uppercase">Favorite Customer</small>
                </div>
            </div>
            <div class="pt-4 pb-5 px-5">
                {{ $item->comments }}
            </div>
        </div>
    @endforeach
@endsection
