@extends('layouts.front')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/css/lightgallery.min.css" integrity="sha512-Szyqrwc8kFyWMllOpTgYCMaNNm/Kl8Fz0jJoksPZAWUqhE60VRHiLLJVcIQKi+bOMffjvrPCxtwfL+/3NPh/ag==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection
@section('content')
<br>
<div class="page-section pt-5 mt-5">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <ul class="breadcrumb p-0 mb-0 bg-transparent">
          <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('k.index')}}">Kegiatan</a></li>
          <li class="breadcrumb-item active">{{$detail->kegiatan}}</li>
        </ul>
      </nav>
      
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-single-wrap">
            <h1 class="post-title">{{$detail->kegiatan}}</h1>
            <div class="post-meta">
            </div>
            <div class="post-content">
              <dl class="row">
                <dt class="col-sm-3">Judul Kegiatan</dt>
                <dd class="col-sm-9">{{$detail->kegiatan}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Waktu</dt>
                <dd class="col-sm-9">{{date('d M Y', strtotime($detail->waktu))}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Tempat</dt>
                <dd class="col-sm-9">{{$detail->tempat}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Sasaran</dt>
                <dd class="col-sm-9">{{$detail->sasaran}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Keterangan</dt>
                <dd class="col-sm-9">{{$detail->keterangan}}</dd>
              </dl>
              <dl class="row">
                <dt class="col-sm-3">Foto Kegiatan</dt>
                <dt class="col-sm-9">
                  <div id="animated-thumbnails">
                  @foreach ($fotos as $item)
                      <a href="{{Storage::url($item->foto)}}">
                          <img src="{{Storage::url($item->foto)}}" />
                      </a>
                      @endforeach
                    </div>
                </dt>
              </dl>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="widget">
            <!-- Widget search -->
            {{-- <div class="widget-box">
              <form action="#" class="search-widget">
                <input type="text" class="form-control" placeholder="Enter keyword..">
                <button type="submit" class="btn btn-primary btn-block">Search</button>
              </form>
            </div> --}}

            <!-- Widget recent post -->
            <div class="widget-box">
              <h4 class="widget-title">Kegiatan Terbaru</h4>
              <div class="divider"></div>
                @foreach ($recent as $item)
                    <div class="blog-item">
                        <div class="content">
                        <h6 class="post-title"><a href="#">{{$item->kegiatan}}</a></h6>
                        <div class="meta">
                            <a href="#"><span class="mai-calendar"></span>{{date('d M Y', strtotime($item->waktu))}}</a>
                        </div>
                        </div>
                    </div>
                @endforeach
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>

@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/2.5.0/lightgallery.min.js" integrity="sha512-FDbnUqS6P7md6VfBoH57otIQB3rwZKvvs/kQ080nmpK876/q4rycGB0KZ/yzlNIDuNc+ybpu0HV3ePdUYfT5cA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  lightGallery(document.getElementById('animated-thumbnails'), {
      thumbnail: true,
  });
</script>
@endsection