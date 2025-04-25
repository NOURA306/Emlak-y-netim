@extends('layouts.admins')
@section('content')
<div class="row">
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Emlaklar</h5>
              <!-- <h6 class="card-subtitle mb-2 text-muted">Bootstrap 4.0.0 Snippet by pradeep330</h6> -->
              <p class="card-text">Emlak sayısı: {{$props_count}}</p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Ev Tipleri</h5>

              <p class="card-text">Ev tipi sayısı: {{$home_types_count}}</p>

            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Yöneticiler</h5>

              <p class="card-text">Yönetici sayısı: {{$adminsCount}}</p>

            </div>
          </div>
        </div>
      </div>
@endsection
