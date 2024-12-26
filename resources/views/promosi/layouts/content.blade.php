<body>
    <div class="container py-5">
        <h1 class="text-center">@yield('menu-title')</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4 py-5">
            @yield('promosi-content')

        </div>
        <div class="row mt-3">
            <div class="col">
                <a href="/" class="btn btn-primary">Kembali</a>

            </div>
        </div>
    </div>
