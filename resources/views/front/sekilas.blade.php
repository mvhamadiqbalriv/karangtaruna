@extends('layouts.front')
@section('content')
<div class="page-banner home-banner">
    <div class="container h-100">
      <div class="row align-items-center h-100">
        <div class="table-responsive">
          <table class="table table-borderless">
            <thead>
              <tr>
                <th scope="col" width="30%">Nama Karang Taruna</th>
                <td scope="col">{{$sekilas->nama_karta}}</td>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row" width="30%">Deskripsi</th>
                <td>
                    {{$sekilas->deskripsi}}
                </td>
              </tr>
              <tr>
                <th scope="row" width="30%">Logo</th>
                <td>
                  <img src="{{Storage::url($sekilas->logo)}}" width="200" height="200" style="object-fit: contain;border-radius: 20px;" alt="">
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection