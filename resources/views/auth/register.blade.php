<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset("assets/plugins/fontawesome-free/css/all.min.css") }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset("assets/dist/css/adminlte.min.css") }}">
</head>
<body class="d-flex align-items-center justify-content-center">

<div class="login-box mt-5">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>REGISTER</b></a>
        </div>
        <div class="card-body">
            @if(count($errors) > 0)
                <div class="alert alert-danger">
                    Email sudah terdaftar.
                </div>
            @endif
            <form action="{{ url('auth/register') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_lengkap"
                           value="{{ old('nama_lengkap') }}">
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                           value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="No Phone" name="no_hp"
                           value="{{ old('no_hp') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone-alt"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Addreess" name="alamat_lengkap"
                           value="{{ old('alamat_lengkap') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-map-signs"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p class="mb-0 mt-4">
                <a href="{{ route("login") }}" class="text-center">Already have account</a>
            </p>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset("assets/plugins/jquery/jquery.min.js") }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset("assets/plugins/bootstrap/js/bootstrap.bundle.min.js") }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset("assets/dist/js/adminlte.min.js") }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset("assets/dist/js/demo.js") }}"></script>
</body>
</html>
