<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Emlakova') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- imported css file -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/mediaelementplayer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/fl-bigmug-line.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app" style="margin-top: -25px;">
        <div class="site-navbar mt-4">
            <div class="container py-1">
                <div class="row align-items-center">
                    <div class=" col-lg-3">
                        <h1 class="mb-0"><a href="{{ url('/') }}" class="text-white h2 mb-0"><strong>Emlakova<span class="text-danger">.</span></strong></a></h1>
                    </div>
                    <div class="col-lg-9">
                        <nav class="site-navigation text-right text-md-right" role="navigation">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3">
                                <a href="#" class="site-menu-toggle js-menu-toggle text-white">
                                    <span class="icon-menu h3"></span>
                                </a>
                            </div>
                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active"><a href="{{ route('home') }}">Ana Sayfa</a></li>
                                <li><a href="{{ route('buy.prop') }}">satılık</a></li>
                                <li><a href="{{ route('rent.prop') }}">kiralık</a></li>
                                <li class="has-children">
                                    <a href="properties.html">Emlaklar</a>
                                    <ul class="dropdown arrow-top">
                                        @foreach ($hometypes as $hometype)
                                            <li><a href="{{ route('display.prop.hometype', $hometype->hometypes) }}">{{ $hometype->hometypes }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{ route('about') }}">Hakkında</a></li>
                                <li><a href="{{ route('contact') }}">İletişim</a></li>
                                @guest
                                    @if (Route::has('login'))
                                        <li><a href="{{ route('login') }}">Giriş Yap</a></li>
                                    @endif
                                    @if (Route::has('register'))
                                        <li><a href="{{ route('register') }}">Hesap Aç</a></li>
                                    @endif
                                @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }}
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('all.requests') }}">Tüm Talepler</a>
                                            <a class="dropdown-item" href="{{ route('all.saved.props') }}">Tüm Kaydedilen Emlaklar</a>
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                Çıkış Yap
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <main class="py-4">
        @yield('content')
    </main>

    {{-- 🔽 Additional Home Section --}}
    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <form action="{{ route('search.prop') }}" method="GET" class="form-search col-md-12">
                <div class="row align-items-end">
                    <div class="col-md-4">
                        <label for="search">Emlak Tipi</label>
                        <div class="select-wrap">
                            <select name="type" id="search" class="form-control">
                                <option value="">Hepsi</option>
                                @foreach ($hometypes as $hometype)
                                    <option value="{{ $hometype->hometypes }}">{{ $hometype->hometypes }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="location">Konum</label>
                        <input type="text" name="location" id="location" class="form-control" placeholder="İl / İlçe">
                    </div>
                    <div class="col-md-4">
                        <input type="submit" class="btn btn-primary btn-block" value="Ara">
                    </div>
                </div>
            </form>
        </div>
    </div>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5">
                    <h3 class="footer-heading mb-4">Emlakova Hakkında</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem eius porro quam totam laborum doloremque voluptatum?</p>
                </div>
                <div class="col-lg-4 mb-5">
                    <h3 class="footer-heading mb-4">Bizi takip edin</h3>
                    <p>&copy; 2025 Emlakova. Tüm hakları saklıdır.</p>
                    <div>
                        <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                        <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    {{-- Imported Js links --}}
    {{-- Imported JS links - Bootstrap 4 uyumlu --}}
<script src="{{ asset('assets/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script> {{-- Bootstrap 4 --}}
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/js/mediaelement-and-player.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('assets/js/aos.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

{{-- ❌ Bootstrap 5 CDN script kaldırıldı --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script> --}}


</body>

</html>
