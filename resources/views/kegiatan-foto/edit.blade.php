@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('Ubah Foto') }}</h2>
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

                <form action="{{ route('kegiatan-foto.update', $update->id_foto) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="id_kegiatan">{{ __('Kegiatan') }}</label>
                                <select name="id_kegiatan" class="form-control @error('id_kegiatan') is-invalid @enderror" id="id_kegiatan">
                                    @foreach ($activities as $item)
                                        <option value="{{$item->id_kegiatan}}" {{(!isset($_GET['id_kegiatan']) ? 'disabled' : ($_GET['id_kegiatan'] != $item->id_kegiatan) ? 'disabled' : 'selected')}}>{{$item->kegiatan}}</option>
                                    @endforeach
                                </select>
                                @error('id_kegiatan')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="deskripsi">{{ __('Deskripsi') }}</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" required>{{old('deskripsi', $update->deskripsi)}}</textarea>
                                @error('deskripsi')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <img src="{{Storage::url($update->foto)}}" width="200" height="200" style="object-fit: contain;border-radius: 20px;margin-bottom: 20px;" alt="">
                            <div class="input-style-1">
                                <label for="foto">{{ __('Foto') }}</label>
                                <input @error('foto') class="form-control is-invalid" @enderror type="file"
                                       name="foto" id="foto">
                                @error('foto')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="tanggal">{{ __('Tanggal') }}</label>
                                <input type="date" @error('tanggal') class="form-control is-invalid"
                                       @enderror name="tanggal" value="{{old('tanggal', date('Y-m-d', strtotime($update->tanggal)))}}" id="tanggal" placeholder="{{ __('Tanggal') }}"
                                       required>
                                @error('tanggal')
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