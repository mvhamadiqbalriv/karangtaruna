@extends('layouts.front')
@section('content')
<div class="page-banner home-banner">
    <div class="container h-100">
      <div class="row align-items-center h-100">
        <div class="col-lg-6 py-3 wow fadeInUp">
          <h1 class="mb-4">Halo, Selamat Datang di</h1>
          <p class="text-lg mb-5">Laman resmi Karang Taruna Kotakaler Sumedang</p>

          <a href="{{route('front.sekilas')}}" class="btn btn-outline border text-secondary">Info Detail</a>
        </div>
        <div class="col-lg-6 py-3 wow zoomIn">
          <div class="img-place">
            <img src="{{asset('front')}}/img/hero_1.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="page-section border-top">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Kegiatan Kita</div>
        <h2 class="title-section">Lihat <span class="marked"> Kegiatan </span> terakhir kita</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row my-5 card-blog-row">
        @foreach ($activities as $item)
            @if($loop->iteration == 1)
              <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
                <div class="card-blog">
                  <div class="header">
                    <div class="entry-footer">
                      <a href="#" class="post-date">{{date('d M Y', strtotime($item->waktu))}}</a>
                    </div>
                  </div>
                  <div class="body">
                    <div class="post-title"><a href="{{route('k.show', $item->id_kegiatan)}}">{{$item->kegiatan}}</a></div>
                  </div>
                  <div class="footer">
                    <a href="{{route('k.show', $item->id_kegiatan)}}">Lihat selengkapnya<span class="mai-chevron-forward text-sm"></span></a>
                  </div>
                </div>
              </div>
            @else
              <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
                <div class="card-blog">
                    <div class="header">
                    <div class="entry-footer">
                        <a href="#" class="post-date">{{date('d M Y', strtotime($item->waktu))}}</a>
                    </div>
                    </div>
                    <div class="body">
                    <div class="post-title"><a href="{{route('k.show', $item->id_kegiatan)}}">{{$item->kegiatan}}</a></div>
                    <div class="post-excerpt">{{Str::limit($item->keterangan, '50', '(...)')}}</div>
                    </div>
                    <div class="footer">
                    <a href="{{route('k.show', $item->id_kegiatan)}}">Lihat selengkapnya<span class="mai-chevron-forward text-sm"></span></a>
                    </div>
                </div>
                </div>
            @endif
        @endforeach
      </div>
      <div class="text-center">
        <a href="{{route('k.index')}}" class="btn btn-outline-primary rounded-pill">Lihat semua Kegiatan</a>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->

  <div class="page-section border-top">
    <div class="container">
      <div class="text-center wow fadeInUp">
        <div class="subhead">Berita</div>
        <h2 class="title-section">Baca <span class="marked">Berita</span> Terbaru</h2>
        <div class="divider mx-auto"></div>
      </div>
      <div class="row my-5 card-blog-row">
        @foreach ($news as $item)
            @if ($loop->iteration == 1)
            <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
                <div class="card-blog" style="height: 350px;max-height:350px;">
                  <div class="header">
                    <div class="entry-footer">
                      <a href="#" class="post-date">{{date('d M Y', strtotime($item->berita_tanggal))}}</a>
                    </div>
                  </div>
                  <div class="body">
                    <div class="post-title"><a href="{{route('b.show', $item->berita_id)}}">{{$item->berita_judul}}</a></div>
                    <div style="color: white;">{{Str::limit($item->berita_isi, 50, '(...)')}}</div>
                  </div>
                  <div class="footer">
                    <a href="{{route('b.show', $item->berita_id)}}">Lihat selengkapnya<span class="mai-chevron-forward text-sm"></span></a>
                  </div>
                </div>
              </div>
            @else 
            <div class="col-md-6 col-lg-3 py-3 wow fadeInUp">
                <div class="card-blog" style="height: 350px;max-height:350px;">
                    <img class="card-img-top" src="{{Storage::url($item->berita_image)}}" height="100px;" style="object-fit: cover;margin-bottom:10px;" alt="Card image cap">
                    <div class="header">
                        <img src="" alt="">
                        <div class="entry-footer">
                          <a href="#" class="post-date">{{date('d M Y', strtotime($item->berita_tanggal))}}</a>
                        </div>
                      </div>
                  <div class="body">
                    <div class="post-title"><a href="{{route('b.show', $item->berita_id)}}">{{$item->berita_judul}}</a></div>
                    <div class="post-excerpt">{{Str::limit($item->berita_isi, 50, '(...)')}}</div>
                  </div>
                  <div class="footer">
                    <a href="{{route('b.show', $item->berita_id)}}">Lihat selengkapnya <span class="mai-chevron-forward text-sm"></span></a>
                  </div>
                </div>
              </div>
            @endif
        @endforeach
        
        
      </div>

      <div class="text-center">
        <a href="{{route('b.index')}}" class="btn btn-outline-primary rounded-pill">Lihat semua Berita</a>
      </div>
    </div> <!-- .container -->
  </div> <!-- .page-section -->
@endsection