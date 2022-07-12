@extends('layouts.front')

@section('content')
<div class="page-section border-top mt-5">
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
    </div> <!-- .container -->
  </div> <!-- .page-section -->
@endsection