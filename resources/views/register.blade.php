<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="mt-5">
            <h1 class="mb-5">Buat akun anda</h1>

            @if ($errors->any())
                <div class="alert alert-danger col-md-6">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ url('/register-valid') }}" method="POST">
                @csrf
                <!-- Name input -->
                <div data-mdb-input-init class="col-md-6 form-outline mb-4">
                    <input type="text" name="name" class="form-control form-control-lg"
                        placeholder="Buat username anda" />
                    <label class="form-label" for="name">Username</label>
                </div>

                <!-- Password input -->
                <div data-mdb-input-init class="col-md-6 form-outline mb-3">
                    <input type="password" name="password" class="form-control form-control-lg"
                        placeholder="Buat password anda" />
                    <label class="form-label" for="password">Password</label>
                </div>
                <div class="col-md-6">
                    <button class="btn btn-success form-control" name="submit">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous">
    </script>
</body>

</html>
