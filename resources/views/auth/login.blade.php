<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SIRAT - Login</title>

  <!-- Custom fonts for this template-->
  <link rel="shortcut icon" href="{{ asset('logo.png') }}">
  <link href="{{url('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{url('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <style>
      .style{
        background-image: url('IMG_2416.png'); 
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
  </style>

</head>

<body class="style" class="bg-gradient-primary min-vh-100 d-flex justify-content-center align-items-center" >
<div class="bg justify-content-center align-items-center">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="p-5">

                        <div class="text-center">
                            <img src="{{ asset('logo1.png') }}" width="120" height="150" alt="" class="mb-4">
                            <h1 class="h4 text-gray-900 mb-4">{{ __('SELAMAT DATANG DI APLIKASI SISTEM INFORMASI ARSIP SURAT') }}</h1>
                        </div>

                                @if ($errors->any())
                                    <div class="alert alert-danger border-left-danger" role="alert">
                                        <ul class="pl-4 my-2">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <form method="POST" action="{{ route('login') }}" class="user">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email" placeholder="{{ __('Masukkan Email Anda....') }}" value="{{ old('email') }}" required autofocus>
                                    </div>

                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" placeholder="{{ __('Kata Sandi') }}" required>
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-success btn-user btn-block">
                                            {{ __('Masuk') }}
                                        </button>
                                    </div>

                                    <div class="text-center">
                                      <a class="" href="http://www.bmkgbalikpapan.id/">Kunjungi Website BMKG !</a>
                                    </div>
                    @include('layout.footer')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

  <!-- Bootstrap core JavaScript-->
  <script src="{{url('sbadmin/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{url('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

  <!-- Core plugin JavaScript-->
  <script src="{{url('sbadmin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->
  <script src="{{url('sbadmin/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
