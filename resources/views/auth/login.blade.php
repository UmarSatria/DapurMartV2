@extends('layouts.app')

@section('content')
<div class="container " >
    <br><br><br>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
                <div class="row">
                    <div class="col-md-5">
                        <div class="parent-container" >
                            <img src="{{asset('img/login.png')}}" alt="login-img" width="100%" height="100%" >
                        </div>
                    </div>
                <div class="col-md-7">
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="card-body">
                                <div class="judul">
                                    {{-- {{ __('Login') }} --}}
                                    <h2>Welcome Back!</h2><hr>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                                <div class="col-md-7">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

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
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3" >
                                <div class="col-md-8 offset-md-4" >
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingatkan saya') }}
                                        </label>

                                        @if (Route::has('password.request'))
                                            <a class="btn btn-link ml-2" href="{{ route('password.request') }}">
                                                {{ __('Lupa Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-success">
                                        {{ __('Masuk') }}
                                    </button>
                                    @if (Route::has('register'))
                                    <div class="row mb-5">

                                            <p align="center">Belum punya akun?<a href="{{ route('register') }}" class="btn btn-link">{{ __('Daftar') }}</a></p>

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
@endsection
