<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Dokter</title>
</head>

<body>
    @include('include.navbar')

    <div class="container">
        <h1 class="mt-3 mb-4">Data Dokter</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (Session::has('message2'))
            <p class="alert alert-success">{{ Session::get('message2') }}</p>
        @endif

        @if (Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif

        <a href="{{ url('/tambah-dokter') }}" class="btn btn-primary">Tambah Dokter</a>

        @foreach ($dokters as $dokter)
            <div class="card border border-5 mb-3 mt-3">
                <div class="row g-0">
                    <div class="col-md-3">
                        <img style="width: 200px" src="{{ asset('gambar/' . $dokter->gambar) }}"
                            class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-3">
                        <div class="card-body">
                            <h2 class="card-title">{{ $dokter->nama }}</h2>
                            <h5 class="card-title">Specialis {{ $dokter->specialis }}</h5>
                            <h5 class="card-title ">Hari Beroperasi :
                            </h5>
                            @if($dokter->days->count() < 1) ----
                            @endif
                            @foreach ($dokter->days as $day)
                                <span class="bg-secondary rounded text-white">{{ $day->hari }}</span>
                            @endforeach

                            <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h5>Komentar</h5>
                        <form action="{{ url('/komentar/' . $dokter->id) }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-9 mb-3">
                                    <textarea name="komentar" class="form-control resize border border-5" rows="1" placeholder="Komentar"></textarea>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-success form-control">Simpan</button>
                                </div>
                            </div>
                        </form>

                        <hr class="col-md-11">

                        <div class="overflow-auto border rounded p-2" style="height: 110px;">
                            @foreach ($dokter->komentars as $komentar)
                                <div>
                                    <p>->{{ $komentar->komentar }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ url('/dokter/' . $dokter->id . '/delete') }}" class="btn btn-primary">Hapus Dokter</a>
                {{-- <a href="{{ url('/komentar/'. $dokter->id) }}" class="btn btn-primary">Komentar</a> --}}
            </div>

            <hr>
        @endforeach

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
</body>

</html>
