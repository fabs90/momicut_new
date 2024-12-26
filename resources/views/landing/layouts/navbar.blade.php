<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->
    <div class="discount-box" id="discountBox" style="display: none;">
        <a href="{{ route('promosi') }}">
            <img src="{{ asset('personal') }}/img/Merah & Kuning Illustrasi Promosi Diskon Flash Sale Cerita Instagram.png"
                class="icon-discount">
        </a>
        <span class="close-btn" id="closeDiscountBox">&times;</span>
    </div>


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark px-5 d-none d-lg-block">

    </div>
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="/" class="navbar-brand p-0">
                <h1 class="m-0"><img src="{{ asset('personal') }}/img/logo momicut.png" class="me-2"
                        style="width: 50px; height: 50px;">
                    Momicut
                </h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="#header-carousel" class="nav-item nav-link active">Beranda</a>
                    <a href="{{ route('promosi') }}" class="nav-item nav-link">Promosi</a>
                    <a href="#about" class="nav-item nav-link">Tentang</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Produk</a>
                        <div class="dropdown-menu m-0">
                            <a href="#bumbudasar" class="dropdown-item">Bumbu Dasar</a>
                            <a href="#sambal" class="dropdown-item">Sambal</a>
                            <a href="#bumbuspesial" class="dropdown-item">Bumbu Spesial</a>
                            <a href="#minumanrempah" class="dropdown-item">Minuman Rempah</a>
                        </div>
                    </div>

                </div>

            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100 img1" src="{{ asset('personal') }}/img/carosel 1.jpeg" alt="Image 1">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-black text-uppercase mb-3 animated slideInDown">Bumbu Dasar</h5>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('personal') }}/img/carosel minuman.JPG" alt="Image 2">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-black text-uppercase mb-3 animated slideInDown">Minuman Rempah</h5>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('personal') }}/img/carosel sambal.JPG" alt="Image 3">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-black text-uppercase mb-3 animated slideInDown">Sambal</h5>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('personal') }}/img/carousel bumbu spesial 2.jpeg" alt="Image 5">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-black text-uppercase mb-3 animated slideInDown">Bumbu Spesial</h5>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        



    </div>
    <!-- Navbar & Carousel End -->
