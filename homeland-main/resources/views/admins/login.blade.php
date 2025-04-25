@extends('layouts.admins')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mt-5">Giriş Yap</h5>
                    <form method="POST" class="p-auto" action="{{route('check.login')}}">
                        <!-- Email input -->
                        @csrf
                        <div class="form-outline mb-4">
                            <input type="email" name="email" id="form2Example1" class="form-control"
                                placeholder="E-posta" />
                        </div>
                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example2" placeholder="Şifre"
                                class="form-control" />
                        </div>
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
