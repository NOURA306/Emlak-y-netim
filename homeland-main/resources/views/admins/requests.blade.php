@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-4 d-inline">İstekler</h5>

                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">isim</th>
                                <th scope="col">email</th>
                                <th scope="col">telefon</th>
                                <th scope="col">ajans adı</th>
                                <th scope="col">bu emlak için git</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr>
                                    <th scope="row">{{$request->id}}</th>
                                    <td>{{$request->name}}</td>
                                    <td>{{$request->email}}</td>
                                    <td>{{$request->phone}}</td>
                                    <td>{{$request->agent_name}}</td>
                                    <td><a href="{{route('single.prop', $request->prop_id)}}" class="btn btn-success  text-center ">git</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
