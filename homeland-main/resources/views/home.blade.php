@extends('layouts.app')
@section('content')

<div class="slide-one-item home-slider owl-carousel">
    @foreach ( $props as $prop )
    <div class="site-blocks-cover overlay" style="background-image: url({{ asset('assets/images/'.$prop->image.'') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    @if ($prop->type=="satılık")
                <span class="d-inline-block bg-danger text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                @elseif($prop->type=="kiralık")
                <span class="d-inline-block bg-success text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                @else
                <span class="d-inline-block bg-warning text-white px-3 mb-3 property-offer-type rounded">{{ $prop->type }}</span>
                  @endif  
                <h1 class="mb-2">{{ $prop->title }}</h1>
                    <p class="mb-5">
                        <strong class="h2 text-success font-weight-bold">
                            {{ number_format($prop->price, 0, ',', '.') }}₺
                        </strong>
                    </p>
                    <p><a href="{{ route('single.prop',$prop->id) }}" class="btn btn-white btn-outline-white py-3 px-5 rounded-0 btn-2">Ayrıntıları Gör</a></p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="site-section site-section-sm pb-0">
    <div class="container">
        <div class="row">
            <form action="{{ route('search.prop') }}" method="POST" class="form-search col-md-12" style="margin-top: -100px;">
                @csrf
                <div class="row align-items-end">
                    <div class="col-md-3">
                        <label for="list-types">Listeleme Türleri</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="home_type" id="list-types" class="form-control d-block rounded-0">
                                <option value="Condo">Konut</option>
                                <option value="Commercial Building">Ticari Bina</option>
                                <option value="Land Property">Arsa</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="offer_types">Teklif Türü</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="type" id="offer-types" class="form-control d-block rounded-0">
                                <option value="buy">Satılık</option>
                                <option value="Rent">Kiralık</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="city"> Şehir Seçin</label>
                        <div class="select-wrap">
                            <span class="icon icon-arrow_drop_down"></span>
                            <select name="city" id="select-city" class="form-control d-block rounded-0">
                                <option value="İstanbul">İstanbul</option>
                                <option value="Ankara">Ankara</option>
                                <option value="Bursa">Bursa</option>
                                <option value="bartin">	bartin</option>
                                <option value="İzmir">İzmir</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                    <input name="submit" type="submit" class="btn btn-success text-white btn-block rounded-0" value="Ara">

                    </div>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="view-options bg-white py-3 px-3 d-md-flex align-items-center">
                    <div class="mr-auto">
                        <a href="{{ route('home') }}" class="icon-view view-module active"><span class="icon-view_module"></span></a>
                    </div>
                    <div class="ml-auto d-flex align-items-center">
                        <div>
                            <a href="{{ route('home') }}" class="view-list px-3 border-right active">Tümü</a>
                            <a href="{{ route('rent.prop') }}" class="view-list px-3 border-right">Kiralık</a>
                            <a href="{{ route('buy.prop') }}" class="view-list px-3">Satılık</a>
                            <a href="{{ route('price.asc.prop') }}" class="view-list px-3">Önce En Düşük</a>
                            <a href="{{ route('price.desc.prop') }}" class="view-list px-3">Önce En Yüksek</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section site-section-sm bg-light">
    <div class="container">
        <div class="row mb-5">
            @foreach ($props as $prop)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="property-entry h-100">
                    <a href="{{ route('single.prop',$prop->id) }}" class="property-thumbnail">
                        <div class="offer-type-wrap">
                            <span class="offer-type bg-success">{{ $prop->type }}</span>
                        </div>
                        <img src="{{ asset('assets/images/' . $prop->image.'') }}" alt="Image" class="img-fluid">
                    </a>
                    <div class="p-4 property-body">
                        <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                        <h2 class="property-title"><a href="property-details.html">{{ $prop->title }} </a></h2>
                        <span class="property-location d-block mb-3"><span class="property-icon icon-room"></span> {{ $prop->location }}</span>
                        <strong class="property-price text-primary mb-3 d-block text-success">
                            {{ number_format($prop->price, 0, ',', '.') }}₺
                        </strong>
                        <ul class="property-specs-wrap mb-3 mb-lg-0">
                            <li>
                                <span class="property-specs">Oda Sayısı</span>
                                <span class="property-specs-number">{{ $prop->beds }} </span>
                            </li>
                            <li>
                                <span class="property-specs">Banyo</span>
                                <span class="property-specs-number">{{ $prop->baths }}</span>
                            </li>
                            <li>
                                <span class="property-specs">SQ FT</span>
                                <span class="property-specs-number">{{ $prop->sq_ft }}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- why choose us section starts --}}
<div class="site-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7 text-center">
                <div class="site-section-title">
                    <h2> Neden Bizi Seçmelisiniz?</h2>
                </div>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Debitis maiores quisquam saepe architecto error corporis aliquam. Cum ipsam a consectetur aut sunt sint animi, pariatur corporis, eaque, deleniti cupiditate officia.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 col-lg-4">
                <a href="#" class="service text-center">
                    <span class="icon flaticon-house"></span>
                    <h2 class="service-heading">Semtleri Araştırın</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
                    <p><span class="read-more">Daha Fazla Oku</span></p>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#" class="service text-center">
                    <span class="icon flaticon-sold"></span>
                    <h2 class="service-heading"> Satılan Evler</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
                    <p><span class="read-more">Daha Fazla Oku</span></p>
                </a>
            </div>
            <div class="col-md-6 col-lg-4">
                <a href="#" class="service text-center">
                    <span class="icon flaticon-camera"></span>
                    <h2 class="service-heading">Güvenlik Önceliği</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt iure qui natus perspiciatis ex odio molestia.</p>
                    <p><span class="read-more">Devamını oku</span></p>
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
