@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Tambah Kegiatan') }}</h2>
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

                <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="kegiatan">{{ __('Judul') }}</label>
                                <input type="text" @error('kegiatan') class="form-control is-invalid" @enderror name="kegiatan"
                                       id="kegiatan" placeholder="{{ __('Judul') }}"
                                       value="{{ old('kegiatan')}}" required>
                                @error('kegiatan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="waktu">{{ __('Waktu') }}</label>
                                <input type="date" @error('waktu') class="form-control is-invalid" @enderror name="waktu"
                                       id="waktu" placeholder="{{ __('Waktu') }}"
                                       value="{{ old('waktu')}}" required>
                                @error('waktu')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="tempat">{{ __('Tempat') }}</label>
                                <input type="text" @error('tempat') class="form-control is-invalid" @enderror name="tempat"
                                       id="tempat" placeholder="{{ __('Tempat') }}"
                                       value="{{ old('tempat')}}" required>
                                @error('tempat')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="sasaran">{{ __('Sasaran') }}</label>
                                <input type="text" @error('sasaran') class="form-control is-invalid" @enderror name="sasaran"
                                       id="sasaran" placeholder="{{ __('Sasaran') }}"
                                       value="{{ old('sasaran')}}" required>
                                @error('sasaran')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="keterangan">{{ __('Isi') }}</label>
                                <textarea name="keterangan" id="keterangan" cols="30" rows="5" required>{{old('keterangan')}}</textarea>
                                @error('keterangan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
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