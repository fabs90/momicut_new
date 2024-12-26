<!-- About Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s" id="about">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="section-title position-relative pb-3 mb-5">
                    <h5 class="fw-bold text-primary text-uppercase">Tentang Kami</h5>
                    <h1 class="mb-0">Sejarah Momicut</h1>
                </div>
                <p class="mb-4" style="text-align: justify;">Ibu Icut Nadera memulai usahanya dari hobi memasak,
                    yang kemudian berkembang menjadi
                    bisnis kuliner. Awalnya, ia bergabung dalam kelompok bazar Departemen Pertanian dengan produk
                    minuman sebagai andalannya. Inspirasi muncul dari hasil pangan seperti cabai, bawang, dan tomat
                    yang sering ditemuinya di bazar, sehingga Ibu Icut mulai meracik sambal sendiri. Produk
                    pertamanya, Sambal Honje dan Sambal Bawang, langsung mendapat respons positif dan menjadi best
                    seller.</p>

                <p style="text-align: justify;">Kini, label Sambal MomIcut menawarkan 12 varian sambal, termasuk
                    Sambal Honje, Sambal Ijo, Sambal
                    Teri, Sambal Jengkol, hingga Sambal Salmon, semuanya diracik khusus oleh Ibu Icut. Selain
                    sambal, ia juga menciptakan aneka bumbu dasar seperti bumbu putih, merah, oranye, dan kuning,
                    yang dilabeli Bumbu MomIcut. Tidak berhenti di situ, ia menghadirkan bumbu spesial seperti Bumbu
                    Balado, Bumbu Soto, hingga Bumbu Rawon, yang juga diminati konsumen.</p>

                <p style="text-align: justify;">Semua produk MomIcut dibuat dari bahan berkualitas tanpa pengawet,
                    dengan rasa lezat dan harga
                    terjangkau. Selama pandemi, Ibu Icut memperluas usahanya ke minuman herbal dengan label Keluarga
                    Rempah, menawarkan varian seperti Beras Kencur, Ratu Rempah, Raja Rempah, dan Putri Rempah, yang
                    menyegarkan sekaligus menyehatkan.
                </p>
                <div class="d-flex align-items-center mb-4 wow fadeIn" data-wow-delay="0.6s">
                </div>

            </div>
            <div class="col-lg-5" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <video class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s"
                        style="object-fit: cover; border-radius: 15px;" autoplay loop muted>
                        <source src="{{ asset('personal') }}/img/vidioukm.mp4" type="video/mp4">
                    </video>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- About End -->



@yield('produkKategoriLain')



<!-- Customer Review Start -->
<div class="container-fluid bg-light bg-icon py-6 mb-5" id="kastemer" style="padding: 100px 0;">
    <div class="container">
        <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s"
            style="max-width: 500px;">
            <h5 class="fw-bold text-primary text-uppercase">Pelanggan Kami</h5>
                <h1 class="display-5 mb-3">Ulasan Pelanggan</h1>
                <p>Ulasan pelanggan yang sudah membeli produk kami.</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div id="review-carousel" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @yield('testimoniCarousel')
                        </div>
                        <div class="carousel-control-prev" type="button" data-bs-target="#review-carousel"
                            data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </div>
                        <div class="carousel-control-next" type="button" data-bs-target="#review-carousel"
                            data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Testimonial Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-4 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase">Testimonial</h5>
            <h1 class="mb-0">Apa kata pelanggan!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.6s">
            @yield('testimonial')

        </div>
    </div>
</div>
<!-- Testimonial End -->

<!-- Blog Start -->
<div class="container-xxl px-0 wow fadeIn" data-wow-delay="0.1s" style="margin-bottom: -6px;">
    <div class="section-header text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-5 mb-3">Alamat Kami</h1>
        <p>Berisikan alamat rumah kami</p>
    </div>
    <iframe class="w-100" style="height: 450px;"
        src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3965.208515319945!2d106.87311109999999!3d-6.3670556000000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwMjInMDEuNCJTIDEwNsKwNTInMjMuMiJF!5e0!3m2!1sid!2sid!4v1728013398966!5m2!1sid!2sid"
        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<!-- Blog End -->




<!-- Blog Start -->
<div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
            <h5 class="fw-bold text-primary text-uppercase"></h5>
            <h1 class="mb-0">Projek Kami</h1>
        </div>
        <style>
            .blog-img img {
                width: 100%;
                height: 500px; /* Atur tinggi sesuai kebutuhan */
                object-fit: cover; /* Pastikan gambar terpotong secara proporsional */
            }
        </style>
        <div class="row g-5">
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('personal') }}/img/bazar 1.jpeg" alt="Project Image">
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Oct, 2024</small>
                        </div>
                        <h4 class="mb-3">Bazar di MOI, Jakarta Utara </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('personal') }}/img/bazar 2.jpeg" alt="Project Image">
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Oct, 2024</small>
                        </div>
                        <h4 class="mb-3">Bazar di Blok M Mall </h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.9s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('personal') }}/img/bazar 3.jpeg" alt="Project Image">
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Oct, 2024</small>
                        </div>
                        <h4 class="mb-3">Bazar di Mall Basura</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="1.2s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('personal') }}/img/bazar 4.jpeg" alt="Project Image">
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Oct, 2024</small>
                        </div>
                        <h4 class="mb-3">Bazar di Kalibata City Mall</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="1.5s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('personal') }}/img/bazar 5.jpeg" alt="Project Image">
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Oct, 2024</small>
                        </div>
                        <h4 class="mb-3">Bazar di Kuningan City, Jakarta Selatan</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 wow slideInUp" data-wow-delay="1.8s">
                <div class="blog-item bg-light rounded overflow-hidden">
                    <div class="blog-img position-relative overflow-hidden">
                        <img class="img-fluid" src="{{ asset('personal') }}/img/bazar 6.png" alt="Project Image">
                    </div>
                    <div class="p-4">
                        <div class="d-flex mb-3">
                            <small><i class="far fa-calendar-alt text-primary me-2"></i>01 Oct, 2024</small>
                        </div>
                        <h4 class="mb-3">Bazar bersama Pak Bambang di Transmart Cibubur</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Blog Start -->