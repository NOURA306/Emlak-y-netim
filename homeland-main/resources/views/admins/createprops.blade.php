@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Gayrimenkul Oluştur</h5>
                    <form method="POST" action="{{ route('admins.storeProps') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- Başlık -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="title" class="form-control" placeholder="başlık" />
                        </div>
                        @error('title')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Fiyat -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" class="form-control" placeholder="fiyat" />
                        </div>
                        @error('price')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Görsel Yükleme -->
                        <div class="mb-3">
                            <label for="formFile" class="form-label">İlan Görseli</label>
                            <input name="image" class="form-control" type="file" id="formFile">
                        </div>
                        @error('image')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Oda Sayısı -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="beds" class="form-control" placeholder="oda sayısı" />
                        </div>
                        @error('beds')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Banyo Sayısı -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="baths" class="form-control" placeholder="banyo sayısı" />
                        </div>
                        @error('baths')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Metrekare -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="sq_ft" class="form-control" placeholder="Metrekare (m²)" />
                        </div>
                        @error('sq_ft')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- İnşa Yılı -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="year_built" class="form-control" placeholder="İnşa Yılı" />
                        </div>
                        @error('year_built')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Metrekare Başına Fiyat -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="number" name="price_sqft" class="form-control" placeholder="m² Başına Fiyat" />
                        </div>
                        @error('price_sqft')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Konum -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="location" class="form-control" placeholder="konum" />
                        </div>
                        @error('location')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- İlan Tipi -->
                        <select name="type" class="form-control mt-3 mb-4 form-select">
                            <option selected>Tip Seçiniz</option>
                            <option value="Satılık">Satılık</option>
                            <option value="Kiralık">Kiralık</option>
                            <option value="Devren">Devren</option>
                        </select>
                        @error('type')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Şehir -->
                        <select name="city" class="form-control mt-3 mb-4 form-select">
                            <option selected>Şehir Seçiniz</option>
                            <option value="istanbul">istanbul</option>
                            <option value="izmir">izmir</option>
                            <option value="bartin">bartin</option>
                            <option value="Ankara">Ankara</option>
                            <option value="bursa">bursa</option>
                        </select>
                        @error('city')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Detaylı Bilgi -->
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Ek Bilgiler</label>
                            <textarea placeholder="Ek Bilgi" name="more_info" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        @error('more_info')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Danışman Adı -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="agent_name" class="form-control" placeholder="danışman adı" />
                        </div>
                        @error('agent_name')
                            <span class="text-danger" role="alert"><strong>{{ $message }}</strong></span>
                        @enderror

                        <!-- Gönder Butonu -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Oluştur</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
