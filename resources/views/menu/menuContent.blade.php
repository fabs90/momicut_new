@extends('menu.layouts.master')
@section('menu-title', $category->kategori)
@section('menu-content')
    @foreach ($products as $item)
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
                </div>
                <div class="px-3 mt-2">
                    <p class="text-dark" style="text-align: justify;">{{ $item->deskripsi }}</p>
                </div>
                               
                <a href="https://wa.me/6281234567890?text=Saya%20ingin%20memesan%20{{ $item->nama }}%20apakah%20tersedia?"
                    class="btn btn-success rounded-pill btn-sm d-flex justify-content-center align-items-center text-center mt-3">
                    <i class="fab fa-whatsapp me-2"></i>Pesan Disini
                </a>
            </div>
        </div>
    @endforeach
@endsection
