<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah Dokter</title>
</head>

<body>
    @include('include.navbar')

    <div class="container">
        <h2 class="mt-5">Tambah Dokter</h2>

        @if ($errors->any())
            <div class="alert alert-danger col-md-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- nama --}}
        <form action="{{ url('/simpan-dokter') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div data-mdb-input-init class="form-outline mb-3">
                <label class="form-label" for="nama">Nama lengkap Dokter</label>
                <input type="text" name="nama" class="form-control border border-5"
                    placeholder="Nama Lengkap Dokter" />
            </div>

            {{-- specialis --}}
            <div class="mb-3">
                <label for="specialis" class="form-label">Specialis Dokter</label>
                <select name="specialis" class="form-select border border-5" required>
                    <option value="">-- Pilih --</option>
                    <option value="mata">Spesialis Mata</option>
                    <option value="telinga">Spesialis Telinga</option>
                    <option value="gigi">Spesialis Gigi</option>
                    <option value="wajah">Spesialis Wajah</option>
                </select>
            </div>

            {{-- gambar --}}
            <div data-mdb-input-init class="form-outline mb-3">
                <label class="form-label" for="gambar">Gambar Dokter</label>
                <input type="file" name="gambar" class="form-control border border-5" placeholder="Gambar Dokter" />
            </div>

            {{-- tombol --}}
            <div class="justify-content-end">
                <button type="submit" class="btn btn-success form-control">Simpan</button>
            </div>

        </form>
    </div>
</body>

</html>
