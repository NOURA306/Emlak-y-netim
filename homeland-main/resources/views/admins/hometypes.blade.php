@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        @if (\Session::has('success'))
                            <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
                                <p class="text-center">{{ session('success') }}</p>
                            </div>
                    </div>
                    @endif
                      @if (\Session::has('update'))
                            <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
                                <p class="text-center">{{ session('update') }}</p>
                            </div>
                    </div>
                    @endif

                      @if (\Session::has('delete'))
                            <div class="alert alert-success col-md-6 mx-auto" style="padding: 5px; margin-bottom: 5px;">
                                <p class="text-center">{{ session('delete') }}</p>
                            </div>
                    </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Ev Tipleri</h5>
                    <a href="{{ route('admins.create.hometypes') }}"
                        class="btn btn-primary mb-4 text-center float-right">Ev Tipi Oluştur</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ad</th>
                                <th scope="col">Güncelle</th>
                                <th scope="col">Sil</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hometypes as $hometype)
                                <tr>
                                    <th scope="row">{{ $hometype->id }}</th>
                                    <td>{{ $hometype->hometypes }}</td>
                                    <td><a href="{{route('admins.edit.hometypes',  $hometype->id )}}"
                                            class="btn btn-warning text-white text-center ">Güncelle</a></td>
                                    <td><a href="{{route('admins.delete.hometypes',  $hometype->id)}}" class="btn btn-danger  text-center ">Sil</a></td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
