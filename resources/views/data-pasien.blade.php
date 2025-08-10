<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pasien</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @include('include.navbar')

    <div class="container">
        <h1 class="text-center mt-5">Data Pasien</h1>

        @if (Session::has('message2'))
            <p class="alert alert-success">{{ Session::get('message2') }}</p>
        @endif

        @if (Session::has('message'))
            <p class="alert alert-danger">{{ Session::get('message') }}</p>
        @endif

        <div class="table-responsive">
            <form class="mt-5" method="get">
                <div class=" mb-3 row">
                    <div class="col-md-6">
                        <input type="text" name="name" value="" class="form-control border-5"
                            placeholder="Cari nama.." aria-label="Recipient's username" aria-describedby="basic-addon2">
                    </div>

                    <div class="col-md-6">
                        <select name="penyakit" class="form-select border border-5">
                            <option value="">-- Keluhan --</option>
                            <option value="mata">Sakit Mata</option>
                            <option value="telinga">Sakit Telinga</option>
                            <option value="gigi">Sakit Gigi</option>
                        </select>
                    </div>
                    <div class="input-group-append mt-3">
                        <button class="btn btn-success" type="submit">Cari</button>
                    </div>
                </div>
            </form>

            <table class="table table-striped table-hover mt-5">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Nomor</th>
                        <th>Alamat</th>
                        <th>Nik</th>
                        <th>Penyakit</th>
                        <th>Dokter</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @if ($pasiens->count() == 0)
                        <tr>
                            <td colspan="9" class="text-center">Tidak ada pasien dengan nama
                                <strong>{{ $name }}</strong>
                            </td>
                        </tr>
                    @endif

                    @foreach ($pasiens as $pasien)
                        <tr>
                            <td>{{ ($pasiens->currentpage() - 1) * $pasiens->perpage() + $loop->index + 1 }}</td>
                            <td>{{ $pasien->name }}</td>
                            <td>{{ $pasien->gender }}</td>
                            <td>{{ $pasien->nomor }}</td>
                            <td>{{ $pasien->alamat }}</td>
                            <td>{{ $pasien->nik->nomor_nik ?? '-' }}</td>
                            <td>{{ $pasien->penyakit }}</td>
                            <td>{{ $pasien->dokter->nama ?? '-' }}</td>
                            {{-- <td><a href="{{ url('/blog/' . $blog->id . '/detail') }}">View</a></td> --}}
                            <td> <a href="{{ url('/data-pasien/' . $pasien->id . '/edit') }}">Edit</a></td>
                            <td> <a href="{{ url('/data-pasien/' . $pasien->id . '/delete') }}">hapus</a></td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $pasiens->links() }}

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>

</body>

</html>
