@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Ubah Berita') }}</h2>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- ========== title-wrapper end ========== -->

    <div class="card-styles">
        <div class="card-style-3 mb-30">
            <div class="card-content">

                @if ($message = Session::get('error'))
                    <div class="alert-box danger-alert">
                        <div class="alert">
                            <h4 class="alert-heading">Error</h4>
                            <p class="text-medium">
                                {{ $message }}
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('berita.update', $update->berita_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="berita_judul">{{ __('Judul') }}</label>
                                <input type="text" @error('berita_judul') class="form-control is-invalid" @enderror name="berita_judul"
                                       id="berita_judul" placeholder="{{ __('Judul') }}"
                                       value="{{ old('berita_judul', $update->berita_judul)}}" required>
                                @error('berita_judul')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="berita_isi">{{ __('Isi') }}</label>
                                <textarea name="berita_isi" id="berita_isi" cols="30" rows="5" required>{{old('berita_isi', $update->berita_isi)}}</textarea>
                                @error('berita_isi')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <img src="{{Storage::url($update->berita_image)}}" width="200" height="200" style="object-fit: contain;border-radius: 20px;margin-bottom: 20px;" alt="">
                            <div class="input-style-1">
                                <label for="berita_image">{{ __('Thumbnail') }}</label>
                                <input @error('berita_image') class="form-control is-invalid" @enderror type="file"
                                       name="berita_image" id="berita_image">
                                @error('berita_image')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="berita_tanggal">{{ __('Tanggal') }}</label>
                                <input type="date" @error('berita_tanggal') class="form-control is-invalid"
                                       @enderror name="berita_tanggal" value="{{old('berita_tanggal', date('Y-m-d', strtotime($update->berita_tanggal)))}}" id="berita_tanggal" placeholder="{{ __('Tanggal') }}"
                                       required>
                                @error('berita_tanggal')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="button-group d-flex justify-content-center flex-wrap">
                                <button type="submit" class="main-btn primary-btn btn-hover w-100 text-center">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection