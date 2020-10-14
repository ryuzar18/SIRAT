<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>SIRAT</title>

        <!-- Fonts -->
        <link rel="shortcut icon" href="{{ asset('logo.png') }}">
        <link href="{{url('sbadmin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="{{url('sbadmin/css/sb-admin-2.min.css')}}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
                background-image: url('IMG_2416.png'); 
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                justify-content: center;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: white;
                padding: 0 25px;
                font-size: 50px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                color: white;
            }


        </style>
    </head>
    <body class="style" class="bg-gradient-primary min-vh-100 d-flex justify-content-center align-items-center" >
            @include('layout.headerk')
        <div class="bg justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-body p-0">
                            <div class="p-5">

                                <div  class="text-center">
                                    <div class="content ">
                                    <img src="{{ asset('logo1.png') }}" width="120" height="150" alt="" class="mb-4">
                                    <h1 class="h4 text-gray-900 mb-4">{{ __('Anda Berhasil Masuk...') }}</h1>

                                    <h3 class="h6 text-gray-900 mb-4">{{ __('Silahkan Tekan Lanjut Untuk Masuk Halaman Utama') }}</h3>

                                            @if (Route::has('login'))
                                            <div class="form-group">
                                                @auth
                                                    @if(Auth::user()->role == 1)
                                                    
                                                    <a href="{{ url('/home') }}" class="btn btn-success btn-user btn-sm" >Lanjut</a>
                                                    
                                                    @else
                                                    <a href="{{ url('/users') }}" class="btn btn-success btn-user btn-sm" >Lanjut</a>
                                                    
                                                    @endif

                                                @endauth
                                            </div>
                                            @endif
                                            <br>
                                            <div class="text-center">
                                            <a class="" href="http://www.bmkgbalikpapan.id/">Kunjungi Website BMKG !</a>
                                            </div>
                                            <br>
                                </div>
                                        <marquee behavior="
                                        " direction="right"><span>Copyright &copy; BMKG x SI ITK 2020</span>
                                        </marquee>
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
