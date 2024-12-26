    <!-- Footer Start -->
    <div class="container-fluid bg-dark footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6" style="text-align: justify;">
                    <h1 class="fw-bold text-danger m-0"> <span style="color: red;">Momicut</span> </h1>
                    <p></p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-square btn-outline-light rounded-circle me-1"
                            href="https://youtube.com/@kbmayuarraffah8886"><i class="fab fa-facebook-f"></i></a>
                        <a target="_blank" class="btn btn-square btn-outline-light rounded-circle me-1"
                            href="https://youtube.com/@kbmayuarraffah8886"><i class="fab fa-youtube"></i></a>
                        <a target="_blank" class="btn btn-square btn-outline-light rounded-circle me-0"
                            href="https://www.instagram.com/rujak.klasik/"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <style>
                    .text-bright-white {
                        color: #ffffff;
                        /* Warna putih */
                        text-shadow: 0px 0px 5px rgba(255, 255, 255, 0.8);
                        /* Efek menyala */
                    }
                </style>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4 text-bright-white">Alamat</h4>
                    <p class="text-bright-white"><i class="fa fa-map-marker-alt me-3"></i>Depok, Indonesia</p>
                    <p class="text-bright-white"><i class="fa fa-phone-alt me-3"></i>085212520915</p>
                    <p class="text-bright-white"><i class="fa fa-envelope me-3"></i>icutnad706@gmail.com</p>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h4 class="text-light mb-4">Quick Links</h4>
                    <a class="btn btn-link" href="{{ route('filament.admin.auth.login') }}">Admin</a>
                   
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="form-review">
                        @if (Session::has('flash_msg_success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{{ Session::get('flash_msg_success') }}</li>
                                </ul>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    <li>{{ $errors->first() }}</li>
                                </ul>
                            </div>
                        @endif
                        <h4 class="text-light mb-4">Beri Kami Penilaian!</h4>
                        <form action="{{ route('customer.review.store') }}" method="post">
                            @csrf
                            <div class="stars">
                                <input type="radio" name="star_rating" value="1" required />
                                <input type="radio" name="star_rating" value="2" />
                                <input type="radio" name="star_rating" value="3" />
                                <input type="radio" name="star_rating" value="4" />
                                <input type="radio" name="star_rating" value="5" />
                                <i></i>
                            </div>
                            <div class="form-group rating-star row">
                                <div class="col-lg-12 col-6 mb-3 mt-2">
                                    <input type="text" class="form-control" id="name" name="username"
                                        value="" placeholder="Nama">
                                </div>
                                <div class="col-lg-12 col-6 mb-3">
                                    <textarea name="comments" cols="24" rows="4" required placeholder="Komen kamu" class="comment-input"></textarea>
                                </div>

                            </div>
                            <button type="submit" class="btn btn-primary rounded-pill py-2 px-3 mt-3">Submit</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        &copy; <a href="#">Fabian dan Raldy</a>, All Right Reserved.
                    </div>
                    <div class="col-md-6 text-center text-md-end">

                        Designed By <a href="https://freewebsitecreate.net"> Website Create</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i
            class="bi bi-arrow-up"></i></a>
