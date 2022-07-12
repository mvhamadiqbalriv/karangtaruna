@extends('layouts.front')

@section('content')
<div class="page-section border-top mt-5">
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
  </div> <!-- .container -->
</div> <!-- .page-section -->
@endsection