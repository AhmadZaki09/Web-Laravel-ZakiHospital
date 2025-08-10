<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Daftar Pasien</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    @include('include.navbar')
    <div class="container">
        <div class="mt-5">
            <h2 class="mb-3">Edit data {{ $pasien->name }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger col-md-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif


            <form action="{{ url('/data-pasien/' . $pasien->id . '/update') }}" method="POST">
                @csrf
                @method('PATCH')

                <!-- Name input -->
                <div class="row">
                    <div data-mdb-input-init class="col-md-6 form-outline mb-4">
                        <label class="form-label" for="name">Nama lengkap</label>
                        <input type="text" name="name" class="form-control border border-5"
                            value="{{ $pasien->name }}" placeholder="Nama Lengkap" />
                    </div>

                    {{-- gender --}}
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <select name="gender" class="form-select border border-5" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki" {{ $pasien->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="perempuan" {{ $pasien->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>

                    </div>

                    {{-- keluhan --}}
                    <div class="col-md-6 mb-3">
                        <label for="penyakit" class="form-label">Keluhan</label>
                        <select name="penyakit" class="form-select border border-5" required>
                            <option value="{{ $pasien->penyakit }}">-- Pilih --</option>
                            <option value="Sakit mata" {{ $pasien->penyakit == 'Sakit mata' ? 'selected' : '' }}>Sakit
                                Mata</option>
                            <option value="Sakit telinga" {{ $pasien->penyakit == 'Sakit telinga' ? 'selected' : '' }}>
                                Sakit Telinga</option>
                            <option value="Sakit gigi" {{ $pasien->penyakit == 'Sakit gigi' ? 'selected' : '' }}>Sakit
                                Gigi</option>
                        </select>
                    </div>

                    {{-- dokter --}}
                    <div class="col-md-6 mb-3">
                        <label for="dokter_id" class="form-label">Pilih Dokter</label>
                        <select name="dokter_id" class="form-select border border-5" required>
                            <option value="{{ $pasien->dokter->nama }}">-- Pilih --</option>
                            @foreach ($dokters as $dokter)
                                <option value="{{ $dokter->id }}"
                                    {{ $pasien->dokter_id == $dokter->id ? 'selected' : '' }}>{{ $dokter->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    {{-- nomor --}}
                    <div class="col-md-6 mb-3">
                        <label for="nomor" class="form-label">Nomor HP</label>
                        <input type="number" name="nomor" class="form-control border border-5"
                            value="{{ $pasien->nomor }}" placeholder="Nomor HP">
                    </div>

                    {{-- alamat --}}
                    <div class="col-md-6 mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea name="alamat" class="form-control resize border border-5" rows="2" placeholder="Alamat Pasien ">{{ $pasien->alamat }}</textarea>
                    </div>

                    {{-- note --}}
                    <div class="col-md-12 mb-3">
                        <label for="note" class="form-label">Catatan Tambahan</label>
                        <textarea name="note" class="form-control resize border border-5" rows="2" placeholder="Catatan Tambahan">{{ $pasien->note }}</textarea>
                    </div>

                    {{-- Simpan --}}
                    <div class="col-md-6 justify-content-end">
                        <button class="btn btn-success form-control">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>
