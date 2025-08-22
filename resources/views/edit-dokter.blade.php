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
        <form action="{{ url('/dokter/' . $dokter->id . '/update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <div data-mdb-input-init class="form-outline mb-3">
                <label class="form-label" for="nama">Nama lengkap Dokter :</label>
                <input type="text" name="nama" value="{{ $dokter->nama }}" class="form-control border border-5"
                    placeholder="Nama Lengkap Dokter" />
            </div>

            {{-- specialis --}}
            <div class="mb-3">
                <label for="specialis" class="form-label">Specialis Dokter :</label>
                <select name="specialis" class="form-select border border-5" required>
                    <option value="">-- Pilih --</option>
                    <option value="mata" {{ $dokter->specialis == 'mata' ? 'selected' : '' }}>Spesialis Mata</option>
                    <option value="telinga" {{ $dokter->specialis == 'telinga' ? 'selected' : '' }}>Spesialis Telinga
                    </option>
                    <option value="gigi" {{ $dokter->specialis == 'gigi' ? 'selected' : '' }}>Spesialis Gigi</option>
                    <option value="wajah" {{ $dokter->specialis == 'wajah' ? 'selected' : '' }}>Spesialis Wajah
                    </option>
                </select>
            </div>


            {{-- Jadwal --}}
            <div data-mdb-input-init class="form-outline mb-3">
                <label class="form-label" for="hari">Jadwal Dokter :</label>

                @if ($dokter->days->count() < 1)
                    ----
                @endif

                @foreach ($dokter->days as $day)
                    <span class="bg-secondary rounded text-white">{{ $day->hari }}</span>
                @endforeach

                @foreach ($days as $key => $day)
                    <div>
                        <input type="checkbox" name="hari[]" id="hari{{ $key }}" value="{{ $day->id }}"
                            class="border border-5" />
                        <label class="form-check-label" for="hari{{ $key }}">
                            {{ $day->hari }}
                        </label>
                    </div>
                @endforeach
            </div>

            {{-- gambar --}}
            <div data-mdb-input-init class="form-outline mb-3">
                <label class="form-label" for="gambar">Gambar Dokter :</label>
                <div>
                    <img style="width: 200px" src="{{ asset('gambar/' . $dokter->gambar) }}"
                        class="img-fluid rounded-start mb-3" alt="...">
                </div>
                <!-- Simpan nama file lama -->
                <input type="hidden" name="gambar_lama" value="{{ $dokter->gambar }}">
                
                <input type="file" name="gambar" value="{{ $dokter->gambar }}" class="form-control border border-5"
                    placeholder="Gambar Dokter" />
            </div>

            {{-- tombol --}}
            <div class="justify-content-end">
                <button type="submit" class="btn btn-success form-control">Simpan</button>
            </div>

        </form>
    </div>
</body>

</html>
