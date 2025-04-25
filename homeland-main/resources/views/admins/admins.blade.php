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
                    <h5 class="card-title mb-4 d-inline">Yöneticiler</h5>
                    <a href="{{ route('admins.create') }}" class="btn btn-primary mb-4 text-center float-right">Yönetici Oluştur</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Yönetici Adı</th>
                                <th scope="col">E-posta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allAdmins as $admin)
                                <tr>
                                    <th scope="row">{{ $admin->id }}</th>
                                    <td>{{ $admin->name }}</td>
                                    <td>{{ $admin->email }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
