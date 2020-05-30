<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>

  <!-- Custom Style -->
  <link rel="stylesheet" href="{{asset('css/app.css')}}">

</head>
<body>
{{--
            @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
--}}
<div class="container-fluid vh-100 overflow-hidden" id="app">
  <div class="row">
    <div class="col-12">
      <nav class="navbar navbar-expand-sm navbar-light">
        <a class="navbar-brand" href="#">
          <img class="navbar-logo d-inline-block align-top"
               src="https://images.unsplash.com/photo-1555952517-2e8e729e0b44?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=250&q=80"
               width="30" height="30" alt="">
          <b class="font-weight-bold">HYPE.YOU.UP</b>
        </a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="#">New Review <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('reviews.index') }}">All Review</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
  </div>
  <div class="row h-90 align-items-center">
    <div class="col-md-6 col-12 text-center my-auto">
      <landing-page-left-component/>
    </div>
    <div class="col-md-6 col-12 mx-auto text-center my-auto">
      <img src="{{ asset('img/Social media Cristina.png') }}" class="w-50" alt="">
    </div>
  </div>
  <div>
    <svg class="mx-auto negative-mt-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
      <path fill="#6E175C" fill-opacity=".20"
            d="M0,96L20,85.3C40,75,80,53,120,37.3C160,21,200,11,240,16C280,21,320,43,360,58.7C400,75,440,85,480,85.3C520,85,560,75,600,69.3C640,64,680,64,720,90.7C760,117,800,171,840,192C880,213,920,203,960,197.3C1000,192,1040,192,1080,197.3C1120,203,1160,213,1200,186.7C1240,160,1280,96,1320,64C1360,32,1400,32,1420,32L1440,32L1440,320L1420,320C1400,320,1360,320,1320,320C1280,320,1240,320,1200,320C1160,320,1120,320,1080,320C1040,320,1000,320,960,320C920,320,880,320,840,320C800,320,760,320,720,320C680,320,640,320,600,320C560,320,520,320,480,320C440,320,400,320,360,320C320,320,280,320,240,320C200,320,160,320,120,320C80,320,40,320,20,320L0,320Z"></path
    </svg>
  </div>
</div>

</body>
</html>
