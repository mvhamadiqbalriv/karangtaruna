@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Sekilas Organisasi') }}</h2>
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

                @if ($message = Session::get('success'))
                    <div class="alert-box success-alert">
                        <div class="alert">
                            <h4 class="alert-heading">Success</h4>
                            <p class="text-medium">
                                {{ $message }}
                            </p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('sekilas.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="nama_karta">{{ __('Nama Karang Taruna') }}</label>
                                <input type="text" @error('nama_karta') class="form-control is-invalid" @enderror name="nama_karta"
                                       id="nama_karta" placeholder="{{ __('Nama Lengkap') }}"
                                       value="{{ old('nama_karta', $data->nama_karta) }}" required>
                                @error('nama_karta')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="deskripsi">{{ __('Deskirpsi') }}</label>
                                <textarea name="deskripsi" class="form-control @error('deskripsi') id-invalid @enderror" id="" cols="30" rows="5" required>
                                    {{old('deskripsi', $data->deskripsi)}}
                                </textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <img src="{{Storage::url($data->logo)}}" width="200" height="200" style="object-fit: cover; margin-bottom: 20px;border-radius: 20px;" alt="">

                            <div class="input-style-1">
                                <label for="logo">{{ __('Logo') }}</label>
                                <input type="file" @error('logo') class="form-control is-invalid" @enderror name="logo">
                                @error('logo')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
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
