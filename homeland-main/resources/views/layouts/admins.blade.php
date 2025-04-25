<!DOCTYPE html> 
<html lang="en"> <!-- Sayfanın dili İngilizce olarak ayarlanmış -->

<head>
    <meta charset="utf-8"> <!-- Karakter kodlaması UTF-8 -->
    <!-- Bu dosya Bootsnipp.com'dan indirilmiştir. Keyfini çıkarın! -->
    <title>Yönetici Paneli</title> <!-- Tarayıcı sekmesinde görünen başlık -->
    <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Mobil uyumlu görünüm -->
    
    <!-- Bootstrap CSS bağlantısı -->
    <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <!-- Projeye ait özel stil dosyası -->
    <link href="{{ asset('assets/styles/style.css') }}" rel="stylesheet">

    <!-- jQuery kütüphanesi -->
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Bootstrap JavaScript dosyası -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div id="wrapper"> <!-- Sayfa sarmalayıcı -->
    
        <!-- Üst navigasyon menüsü -->
        <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
            <div class="container">
                <!-- Sol üstteki logo -->
                <a class="navbar-brand" href="#">LOGO</a>
                
                <!-- Mobil uyumlu menü butonu -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Menüyü Aç/Kapat">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menü öğeleri -->
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav side-nav">
                    
                        <!-- Admin kullanıcı giriş yaptıysa -->
                        @auth('admin')
                            <li class="nav-item">
                                <a class="nav-link text-white" style="margin-left: 20px;"
                                    href="{{ route('admins.dashboard') }}">Ana Sayfa
                                    <span class="sr-only">(şu anki)</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.display') }}"
                                    style="margin-left: 20px;">Yöneticiler</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.hometypes') }}"
                                    style="margin-left: 20px;">Ev Tipleri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('admins.allProps')}}"
                                    style="margin-left: 20px;">Gayrimenkuller</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.allRequests') }}"
                                    style="margin-left: 20px;">Talepler</a>
                            </li>
                        </ul>

                        <!-- Sağ üstteki kullanıcı adı ve çıkış -->
                        <ul class="navbar-nav ml-md-auto d-md-flex">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admins.dashboard') }}">Ana Sayfa
                                    <span class="sr-only">(şu anki)</span>
                                </a>
                            </li>

                            <!-- Kullanıcı adı ve dropdown menü -->
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::guard('admin')->user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Çıkış Yap') }}
                                    </a>
                                </div> <!-- Dropdown menü kapanışı -->

                                <!-- Çıkış formu -->
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>

                        <!-- Eğer giriş yapılmamışsa (guest) -->
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('view.login') }}">Giriş Yap
                                <span class="sr-only">(şu anki)</span>
                            </a>
                        </li>
                    @endauth

                    </ul>
                </div>
            </div>
        </nav>

        <!-- Sayfa içeriği -->
        <div class="container-fluid">
            <main class="py-4">
                @yield('content') <!-- Diğer sayfaların içeriği buraya gelecek -->
            </main>
        </div>
    </div>
    </div>

    <!-- Boş script bloğu -->
    <script type="text/javascript"></script>
</body>

</html>
