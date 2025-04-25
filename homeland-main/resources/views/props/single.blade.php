@extends('layouts.app') 

@section('content')
    <div class="site-blocks-cover inner-page-cover overlay"
        style="background-image: url({{ asset('assets/images/' . $singleProp->image . '') }});" data-aos="fade">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">
                <div class="col-md-10">
                    <span class="d-inline-block text-white px-3 mb-3 property-offer-type rounded">Mülk Ayrıntıları</span>
                    <h1 class="mb-2">{{ $singleProp->title }}</h1>
                    <p class="mb-5"><strong class="h2 text-success font-weight-bold">{{ $singleProp->price }}₺</strong></p>
                </div>
            </div>
        </div>
    </div>

    @if (\Session::has('success'))
        <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
            <p class="text-center">{{ session('success') }}</p>
        </div>
    @endif

    @if (\Session::has('save'))
        <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
            <p class="text-center">{{ session('save') }}</p>
        </div>
    @endif

    <div class="site-section site-section-sm">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div>
                        <div class="slide-one-item home-slider owl-carousel">
                            @foreach ($propImages as $propImage)
                                <div><img src="{{ asset('assets/images/' . $propImage->image) }}" alt="Image" class="img-fluid"></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="bg-white property-body border-bottom border-left border-right">
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <strong class="text-success h1 mb-3">{{ $singleProp->price }}₺</strong>
                            </div>
                            <div class="col-md-6">
                                <ul class="property-specs-wrap mb-3 mb-lg-0  float-lg-right">
                                    <li>
                                        <span class="property-specs">Oda Sayısı</span>
                                        <span class="property-specs-number">{{ $singleProp->beds }} </span>
                                    </li>
                                    <li>
                                        <span class="property-specs">Banyo Sayısı</span>
                                        <span class="property-specs-number">{{ $singleProp->baths }}</span>
                                    </li>
                                    <li>
                                        <span class="property-specs">m²</span>
                                        <span class="property-specs-number">{{ $singleProp->sq_ft }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">Emlak Tipi</span>
                                <strong class="d-block">{{ $singleProp->home_type }}</strong>
                            </div>
                            <div class="col-md-6 col-lg-4 text-center border-bottom border-top py-3">
                                <span class="d-inline-block text-black mb-0 caption-text">İnşa Yılı</span>
                                <strong class="d-block">{{ $singleProp->year_built }}</strong>
                            </div>
                        </div>
                        <h2 class="h4 text-black">Daha Fazla Bilgi</h2>
                        <p>{{ $singleProp->more_info }}</p>
                        <div class="row no-gutters mt-5">
                            <div class="col-12">
                                <h2 class="h4 text-black mb-3">Galeri</h2>
                            </div>
                            @foreach ($propImages as $propImage)
                                <div class="col-sm-6 col-md-4 col-lg-3">
                                    <a href="{{ asset('assets/images/' . $propImage->image) }}" class="image-popup gal-item">
                                        <img src="{{ asset('assets/images/' . $propImage->image) }}" alt="Image" class="img-fluid">
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3">Temsilciyle İletişime Geçin</h3>
                        @if (isset(Auth::user()->id))
                            @if ($validateFormCount > 0)
                                <p class="alert alert-success">Bu mülke zaten bir istek gönderdiniz</p>
                            @else
                                <form method="POST" action="{{ route('insert.request', $singleProp->id) }}" class="form-contact-agent">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">prop_id</label>
                                        <input type="text" value="{{ $singleProp->id }}" id="name" name="prop_id" type="hidden" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Agent Name</label>
                                        <input type="text" id="name" name="agent_name" type="hidden" value="{{ $singleProp->agent_name }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Ad</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    @error('name')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                    @error('email')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <label for="phone">Telefon</label>
                                        <input type="text" id="phone" name="phone" class="form-control">
                                    </div>
                                    @error('phone')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <div class="form-group">
                                        <input type="submit" id="phone" name="submit" class="btn btn-primary" value="İstek Gönder">
                                    </div>
                                </form>
                            @endif
                        @else
                            <div class="form-group">
                                <a class="alert alert-success" href="{{ route('login') }}">Giriş Yap</a>
                                <p class="alert alert-success mt-2">Bu mülke istek gönderebilmek için giriş yapmanız gerekir</p>
                            </div>
                        @endif
                    </div>

                    <div class="bg-white widget border rounded">
                        <form method="POST" action="{{ route('save.prop', $singleProp->id) }}" class="form-contact-agent">
                            @csrf
                            <h3 class="h4 text-black widget-title mb-3">Emlakları Kaydet</h3>
                            @if (isset(Auth::user()->id))
                                @if ($validateSavingPropsCount > 0)
                                    <p class="alert alert-warning">Bu mülkü zaten kaydettiniz</p>
                                @else
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->id }}" id="name" name="prop_id" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" id="title" name="title" value="{{ $singleProp->title }}" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->image }}" id="name" name="image" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->location }}" id="email" name="location" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" value="{{ $singleProp->price }}" id="email" name="price" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" id="phone" name="submit" class="btn btn-primary" value="Emlak Kaydet">
                                    </div>
                                @endif
                            @else
                                <div class="form-group">
                                    <a class="alert alert-success" href="{{ route('login') }}">Giriş Yap</a>
                                    <p class="alert alert-success mt-2">Bu mülkü kaydedebilmek için giriş yapmanız gerekir</p>
                                </div>
                            @endif
                        </form>
                    </div>

                    <div class="bg-white widget border rounded">
                        <h3 class="h4 text-black widget-title mb-3 ml-0">Paylaş</h3>
                        <div class="px-3" style="margin-left: -15px;">
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ $singleProp->id }}&quote={{ $singleProp->title }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-facebook"></span></a>
                            <a href="https://twitter.com/intent/tweet?text={{ $singleProp->title }}&url={{ $singleProp->id }}" class="pt-3 pb-3 pr-3 pl-0"><span class="icon-twitter"></span></a>
                            <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ $singleProp->id }}"
                                class="pt-3 pb-3 pr-3 pl-0"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="site-section site-section-sm bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="site-section-title mb-5">
                        <h2>İlgili Mülkler</h2>
                    </div>
                </div>
            </div>

            <div class="row mb-5">
                @if ($relatedProps->count() > 0)
                    @foreach ($relatedProps as $relatedProp)
                        <div class="col-md-6 col-lg-4 mb-4">
                            <div class="property-entry h-100">
                                <a href="{{ route('single.prop', $relatedProp->id) }}" class="property-thumbnail">
                                    <div class="offer-type-wrap">
                                        <span class="offer-type bg-danger">Satılık</span> <!-- "Sale" translated to "Satılık" -->
                                        <span class="offer-type bg-success">{{ $relatedProp->type }}</span>
                                    </div>
                                    <img src="{{ asset('assets/images/' . $relatedProp->image . '') }}" alt="Image"
                                        class="img-fluid">
                                </a>
                                <div class="p-4 property-body">
                                    <a href="#" class="property-favorite"><span class="icon-heart-o"></span></a>
                                    <h2 class="property-title"><a
                                            href="{{ route('single.prop', $relatedProp->id) }}">{{ $relatedProp->title }}</a>
                                    </h2>
                                    <span class="property-location d-block mb-3"><span
                                            class="property-icon icon-room"></span>
                                        {{ $relatedProp->location }}</span>
                                        <strong class="property-price text-primary mb-3 d-block text-success">
    {{ number_format($relatedProp->price, 0, ',', '.') }}₺
</strong>

                                    <ul class="property-specs-wrap mb-3 mb-lg-0">
                                        <li>
                                            <span class="property-specs"> Oda Sayısı</span> <!-- "Beds" translated to "Yatak Odası" -->
                                            <span
                                                class="property-specs-number">{{ $relatedProp->beds }}</span>

                                        </li>
                                        <li>
                                            <span class="property-specs">Banyolar</span> <!-- "Baths" translated to "Banyolar" -->
                                            <span class="property-specs-number">{{ $relatedProp->baths }}</span>

                                        </li>
                                        <li>
                                            <span class="property-specs">M²</span> <!-- "SQ FT" translated to "M²" -->
                                            <span class="property-specs-number">{{ $relatedProp->sq_ft }}</span>

                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <h3 class="alert-danger col-md-6">Şu anda ilgili mülkler bulunmamaktadır</h3> <!-- "There are not related properties for now" translated to "Şu anda ilgili mülkler bulunmamaktadır" -->
                @endif
            </div>
        </div>
    </div>

@endsection
