<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="PT. Taspen(persero) ">
    <meta name="keywords" content="login, signin">

    <title>Buat Akun - Absensi Mahasiswa</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,300i" rel="stylesheet">

    <!-- Styles -->
    <link href="/assets/css/core.min.css" rel="stylesheet">
    <link href="/assets/css/app.min.css" rel="stylesheet">
    <link href="/assets/css/style.min.css" rel="stylesheet">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/assets/img/apple-touch-icon.png">
    <link rel="icon" href="/assets/img/favicon.png">
</head>

<body>



<div class="row min-h-fullscreen center-vh p-20 m-0">
    <div class="col-12">
        <div class="card card-shadowed px-50 py-30 w-400px mx-auto" style="max-width: 100%">
            <h5 class="text-uppercase">Buat Akun Baru</h5>
            <br>

            <form class="form-horizontal" method="POST" action="{{ url('/admin/register') }}">
                {{ csrf_field() }}
                <?php
                $getError = '';
                if($errors->has('name'))
                    $getError = 'is-invalid';
                ?>

                <div class="form-group">
                    <input type="text" class="form-control {{$getError}}" id="name"
                           value="{{old('name')}}" name="name">
                    <label for="name">Nama</label>
                    <div class="invalid-feedback">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first('name') }}</li>
                        </ul>
                    </div>
                </div>

                <?php
                if($errors->has('email'))
                    $getError = 'is-invalid';
                else
                    $getError = '';
                ?>
                <div class="form-group">
                    <input type="text" class="form-control {{$getError}}" id="email" name="email" value="{{ old('email')}}">
                    <label for="email">Email</label>
                    <div class="invalid-feedback">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first('email') }}</li>
                        </ul>
                    </div>
                </div>

                <?php
                if($errors->has('password'))
                    $getError = 'is-invalid';
                else
                    $getError = '';
                ?>
                <div class="form-group">
                    <input type="password" class="form-control {{$getError}}" id="password" name="password">
                    <label for="password">Password</label>
                    <div class="invalid-feedback">
                        <ul class="list-unstyled">
                            <li>{{ $errors->first('password') }}</li>
                        </ul>
                    </div>
                </div>

                <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                    <label for="password-confirm">Konfirmasi</label>
                </div>


                <br>
                <button class="btn btn-bold btn-block btn-primary" type="submit">Register</button>
            </form>
        </div>
        <p class="text-center text-muted fs-13 mt-20">Sudah punya akun? <a class="text-primary fw-500" href="/login">Login</a></p>
    </div>


    <footer class="col-12 align-self-end text-center fs-13">
        <p class="mb-0"><small>Ahmad Mirlan &copy; 2018 All rights reserved.</small></p>
    </footer>
</div>

<!-- Scripts -->
<script src="/assets/js/core.min.js"></script>
<script src="/assets/js/app.min.js"></script>
<script src="/assets/js/script.min.js"></script>

</body>
</html>
