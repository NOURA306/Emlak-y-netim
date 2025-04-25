@extends('layouts.app')
@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/15.jpg') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <h1 class="mb-2"> Fiyata Göre Azalan Mülkler
                    </h1>
                </div>
            </div>
        </div>
    </div>
    <div class="site-section site-section-sm bg-light">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>Fiyata Göre Azalan Mülkler</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @foreach ($propsByPriceDesc as $propByDesc)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="property-entry h-100">
                            <a href="{{ route('single.prop', $propByDesc->id) }}" class="property-thumbnail">
                                <div class="offer-type-wrap">
                                    <span class="offer-type bg-success">{{ $propByDesc->type }}</span>
                                </div>
                                <img src="{{ asset('assets/images/' . $propByDesc->image . '') }}" alt="Resim"
                                    class="img-fluid">
                            </a>
                            <div class="p-4 property-body">
                                <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                <h2 class="property-title">
                                    <a href="{{ route('single.prop', $propByDesc->id) }}">{{ $propByDesc->title }}</a>
                                </h2>
                                <span class="property-location d-block mb-3">
                                    <span class="property-icon icon-room"></span>
                                    {{ $propByDesc->location }}
                                </span>
                                <strong class="property-price text-primary mb-3 d-block text-success">
                                    {{ number_format((float)$propByDesc->price, 0, ',', '.') }} ₺
                                </strong>
                                

                                <ul class="property-specs-wrap mb-3 mb-lg-0">
                                    <li>
                                        <span class="property-specs">Oda Sayısı</span>
                                        <span class="property-specs-number">{{ $propByDesc->beds }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Banyo</span>
                                        <span class="property-specs-number">{{ $propByDesc->baths }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Metrekare</span>
                                        <span class="property-specs-number">{{ $propByDesc->sq_ft }}</span>
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
