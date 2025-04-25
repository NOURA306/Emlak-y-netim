@extends('layouts.admins') 
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-body">

                {{-- Başarı ve hata mesajları --}}
                @foreach (['success_gallery', 'error_gallery', 'delete', 'error_delete'] as $msg)
                    @if (session($msg))
                        <div class="alert alert-{{ str_contains($msg, 'error') ? 'danger' : 'success' }}">
                            <p>{!! session($msg) !!}</p>
                        </div>
                    @endif
                @endforeach

                {{-- Başlık ve butonlar --}}
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="card-title m-0">Emlaklar</h5>
                    <div>
                        <a href="{{ route('admins.createGallery') }}" class="btn btn-outline-primary mr-2">Galeri Oluştur</a>
                        <a href="{{ route('admins.createProps') }}" class="btn btn-primary">Emlak Oluştur</a>
                    </div>
                </div>

                {{-- Tablo --}}
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered text-center align-middle">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">İsim</th>
                                <th scope="col">Fiyat</th>
                                <th scope="col">Konum</th>
                                <th scope="col">Tip</th>
                                <th scope="col">Şehir</th>
                                <th scope="col">Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($props as $prop)
                                <tr>
                                    <th scope="row">{{ $prop->id }}</th>
                                    <td>{{ $prop->title }}</td>
                                    <td>{{ number_format((float) $prop->price, 0, ',', '.') }} ₺</td>
                                    <td>{{ $prop->location }}</td>
                                    <td>{{ $prop->type }}</td>
                                    <td>{{ $prop->city }}</td>
                                    <td>
                                        <a href="{{ route('admins.propsDelete', ['id' => $prop->id]) }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Bu emlağı silmek istediğinize emin misiniz?')">Sil</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-muted">Henüz emlak eklenmemiş.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
