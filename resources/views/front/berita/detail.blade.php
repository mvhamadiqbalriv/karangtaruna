@extends('layouts.front')
@section('content')
<br>
<div class="page-section pt-5 mt-5">
    <div class="container">
      <nav aria-label="Breadcrumb">
        <ul class="breadcrumb p-0 mb-0 bg-transparent">
          <li class="breadcrumb-item"><a href="{{route('front.index')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('b.index')}}">Blog</a></li>
          <li class="breadcrumb-item active">{{$detail->berita_judul}}</li>
        </ul>
      </nav>
      
      <div class="row">
        <div class="col-lg-8">
          <div class="blog-single-wrap">
            <div class="header">
              <div class="post-thumb">
                <img src="{{Storage::url($detail->berita_image)}}" alt="">
              </div>
            </div>
            <h1 class="post-title">{{$detail->berita_judul}}</h1>
            <div class="post-meta">
              <div class="post-date">
                <span class="icon">
                  <span class="mai-time-outline"></span>
                </span> <a href="#">{{date('d M Y', strtotime($detail->berita_tanggal))}}</a>
              </div>
            </div>
            <div class="post-content">
                {{$detail->berita_isi}}
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
              <h4 class="widget-title">Berita Terbaru</h4>
              <div class="divider"></div>
                @foreach ($recent as $item)
                    <div class="blog-item">
                        <a class="post-thumb" href="">
                        <img src="{{Storage::url($item->berita_image)}}" alt="">
                        </a>
                        <div class="content">
                        <h6 class="post-title"><a href="#">{{$item->berita_judul}}</a></h6>
                        <div class="meta">
                            <a href="#"><span class="mai-calendar"></span>{{date('d M Y', strtotime($item->berita_tanggal))}}</a>
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