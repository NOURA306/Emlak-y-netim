@extends('layouts.app') {{-- Ana şablon dosyasını genişletiyoruz --}}
@section('content') {{-- İçerik bölümü başlangıcı --}}
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/5.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2"> Artan Fiyata Göre Mülkler </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Artan Fiyata Göre Mülkler</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @foreach ($propsByPriceAsc as $propByAsc)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $propByAsc->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-success">{{ $propByAsc->type }}</span> {{-- Mülk tipi (Satılık, Kiralık vs.) --}}
                                </div>
                                <img src="{{ asset('assets/images/' . $propByAsc->image . '') }}" alt="Görsel"
                                    class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title">
                                    <a href="{{ route('single.prop', $propByAsc->id) }}">{{ $propByAsc->title }}</a>
                                </h2>
                                <span class="property-location d-block mb-3">
                                    <span class="property-icon icon-room"></span>
                                    {{ $propByAsc->location }} {{-- Konum bilgisi --}}
                                </span>
                                <strong class="property-price text-primary mb-3 d-block text-success">
                                    {{ number_format((float)$propByAsc->price, 0, ',', '.') }} ₺ {{-- Fiyatı Türk Lirası formatında gösteriyoruz --}}
                                </strong>
                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Oda Sayısı</span>
                                        <span class="property-specs-number">{{ $propByAsc->beds }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Banyo</span>
                                        <span class="property-specs-number">{{ $propByAsc->baths }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Metrekare</span>
                                        <span class="property-specs-number">{{ $propByAsc->sq_ft }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@endsection
