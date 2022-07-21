@extends('layouts.app')

@section('content')
    <!-- ========== title-wrapper start ========== -->
    <div class="title-wrapper pt-30">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="title mb-30">
                    <h2>{{ __('My profile') }}</h2>
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

                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="nama_lengkap">{{ __('Nama Lengkap') }}</label>
                                <input type="text" @error('nama_lengkap') class="form-control is-invalid" @enderror name="nama_lengkap"
                                       id="nama_lengkap" placeholder="{{ __('Nama Lengkap') }}"
                                       value="{{ old('nama_lengkap', auth()->user()->nama_lengkap) }}" required>
                                @error('nama_lengkap')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="username">{{ __('Username') }}</label>
                                <input type="text" @error('username') class="form-control is-invalid" @enderror name="username"
                                       id="username" placeholder="{{ __('Username') }}"
                                       value="{{ old('username', auth()->user()->username) }}" required>
                                @error('username')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="email">{{ __('Email') }}</label>
                                <input @error('email') class="form-control is-invalid" @enderror type="email"
                                       name="email" id="email" placeholder="{{ __('Email') }}"
                                       value="{{ old('email', auth()->user()->email) }}" required>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        @if (Auth::user()->level->nama_level == 'Pengurus')
                            <div class="col-12">
                                <div class="input-style-1">
                                    <label for="id_level">{{ __('Jenis Anggota') }}</label>
                                    <select name="id_level" class="form-control  @error('id_level') is-invalid @enderror"  id="id_level">
                                        @foreach ($level as $item)
                                            <option value="{{$item->id_level}}" {{ old('id_level') == $item->id_level ? 'selected' : null }}>{{$item->nama_level}}</option>
                                        @endforeach
                                    </select>
                                    @error('id_level')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="password">{{ __('New password') }}</label>
                                <input type="password" @error('password') class="form-control is-invalid"
                                       @enderror name="password" id="password" placeholder="{{ __('New password') }}"
                                       required>
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="input-style-1">
                                <label for="password_confirmation">{{ __('New password confirmation') }}</label>
                                <input type="password" @error('password') class="form-control is-invalid"
                                       @enderror name="password_confirmation" id="password_confirmation"
                                       placeholder="{{ __('New password confirmation') }}" required>
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
