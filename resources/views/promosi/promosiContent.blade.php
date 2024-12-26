@extends('promosi.layouts.master')
@section('promosi-content')
    @foreach ($promosi as $item)
        <div class="col">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $item->image) }}" class="card-img-top img-fluid" alt="..." />
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <p class="card-text">
                        {!! $item->deskripsi !!}
                    </p>
                    <div class="mt-auto">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            @if ($item->harga != null)
                            <span class="text-body text-decoration-line-through me-3">{{ $item->harga + 5000 }}</span>
                                <h3>{{ $item->harga }}</h3>
                            @else
                                <h3>-</h3>
                            @endif
                        </div>
                        <a href="https://wa.me/6285212520915?text=Saya%20ingin%20memesan%20{{ $item->judul }}%20,apakah%20tersedia?"
                            class="btn btn-success rounded-pill btn-sm d-flex justify-content-center align-items-center text-center mt-2">
                            <i class="fab fa-whatsapp me-2"></i>Pesan Disini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endsection
