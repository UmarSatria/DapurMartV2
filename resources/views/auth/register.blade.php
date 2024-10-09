@extends('layouts.app')

@section('content')
<div class="container">
    <br>
    <br>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="row">

                    <div class="col-md-5">
                        <div class="parent-container">
                            <img src="{{asset('img/register.png')}}" alt="" width="100%" height="100%">
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="card-body">
                                    <div class="judul">
                                        {{-- {{ __('Login') }} --}}
                                        <h2>Register Akun</h2><hr>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nama') }}</label>

                                    <div class="col-md-7">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                    <div class="col-md-7">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-7">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Konfirmasi Password') }}</label>

                                    <div class="col-md-7">
                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-success">
                                            {{ __('Daftar') }}
                                        </button>

                                        @if (Route::has('login'))
                                        <div class="row mb-5">
                                            <p align="center">Sudah punya akun?<a class="btn btn-link" href="{{ route('login') }}">{{ __('Masuk') }}</a></p>
                                        </div>
                                        @endif

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
