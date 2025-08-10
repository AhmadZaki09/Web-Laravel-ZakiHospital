<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    @include('include.navbar')

    <div id="carouselExampleIndicators" class="carousel slide mb-1" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('storage/gambar/banner3.avif') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/gambar/data2.jpg') }}" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('storage/gambar/daftar.webp') }}" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @if (Session::has('message2'))
        <p class="alert alert-success">{{ Session::get('message2') }}</p>
    @endif

    @if (Session::has('message'))
        <p class="alert alert-danger">{{ Session::get('message') }}</p>
    @endif

    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="../storage/gambar/daftar.webp" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Pendaftaran Pasien</h5>
                        <p class="card-text">Daftarkan keluhan penyakit anda</p>
                        <a href="{{ url('/daftar-pasien') }}" class="btn btn-primary">Daftar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="../storage/gambar/data2.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Data Pasien</h5>
                        <p class="card-text">Lihat data-data pasien yang sudah terdaftar</p>
                        <a href="{{ url('/data-pasien') }}" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="../storage/gambar/banner3.avif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Data Dokter</h5>
                        <p class="card-text">Data-data dokter di zaki hospital</p>
                        <a href="{{ url('/dokter') }}" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card" style="width: 18rem;">
                    <img src="../storage/gambar/banner3.avif" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the
                            card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div
        class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary mt-5">
        <!-- Copyright -->
        <div class="text-white mb-3 mb-md-0">
            Copyright © 2020. All rights reserved.
        </div>
        <!-- Copyright -->

        <!-- Right -->
        <div>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="#!" class="text-white me-4">
                <i class="fab fa-google"></i>
            </a>
            <a href="#!" class="text-white">
                <i class="fab fa-linkedin-in"></i>
            </a>
        </div>
        <!-- Right -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>
