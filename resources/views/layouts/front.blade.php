<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>@yield('title', 'Karang Taruna')</title>

  <link rel="stylesheet" href="{{asset('front')}}/vendor/animate/animate.css">

  <link rel="stylesheet" href="{{asset('front')}}/css/bootstrap.css">

  <link rel="stylesheet" href="{{asset('front')}}/css/maicons.css">

  <link rel="stylesheet" href="{{asset('front')}}/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="{{asset('front')}}/css/theme.css">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <nav class="navbar navbar-expand-lg navbar-light navbar-float">
      <div class="container">
        <a href="{{route('front.index')}}" class="navbar-brand">Karang<span class="text-primary">Taruna.</span></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-lg-4 pt-3 pt-lg-0">
            <li class="nav-item @if(request()->routeIs('front.index')) active @endif">
              <a href="{{'/'}}" class="nav-link">Home</a>
            </li>
            <li class="nav-item @if(request()->routeIs('front.sekilas')) active @endif">
              <a href="{{url('sekilas-organisasi')}}" class="nav-link">Sekilas</a>
            </li>
            <li class="nav-item @if(request()->routeIs('front.struktur')) active @endif">
              <a href="{{url('struktur-organisasi')}}" class="nav-link">Struktur</a>
            </li>
            <li class="nav-item @if(request()->routeIs('k.index')) active @endif">
              <a href="{{url('k')}}" class="nav-link">Kegiatan</a>
            </li>
            <li class="nav-item @if(request()->routeIs('b.index')) active @endif">
              <a href="{{url('b')}}" class="nav-link">Berita</a>
            </li>
          </ul>

          <div class="ml-auto">
            <a href="{{url('login')}}" class="btn btn-outline rounded-pill">Login</a>
          </div>
        </div>
      </div>
    </nav>

    
  </header>

  <main>
    @yield('content')
  </main>

  <footer class="page-footer">
    <div class="container">

      <div class="row">
        <div class="col-sm-12 py-2 text-center">
          <p id="copyright">&copy; 2022. All rights reserved</p>
        </div>
      </div>
    </div> <!-- .container -->
  </footer> <!-- .page-footer -->


  <script src="{{asset('front')}}/js/jquery-3.5.1.min.js"></script>

  <script src="{{asset('front')}}/js/bootstrap.bundle.min.js"></script>

  <script src="{{asset('front')}}/vendor/wow/wow.min.js"></script>

  <script src="{{asset('front')}}/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="{{asset('front')}}/vendor/waypoints/jquery.waypoints.min.js"></script>

  <script src="{{asset('front')}}/vendor/animateNumber/jquery.animateNumber.min.js"></script>

  <script src="{{asset('front')}}/js/google-maps.js"></script>

  <script src="{{asset('front')}}/js/theme.js"></script>


</body>
</html>