@extends('layouts.app')

@section('content')
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Login Page</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
        <!-- Font Awesome for icons -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    </head>

    <body class="bg-light">
        <div class="container d-flex justify-content-center align-items-center min-vh-100">
            <div class="row w-100">
                <!-- Login Form Section -->
                <div class="col-md-6 bg-white p-4 shadow rounded">
                    <div class="text-center mb-4">
                        <img src="{{ asset('img/dapur.png') }}" alt="" width="10%">
                    </div>
                    <h1 class="text-center mb-3">Welcome Back!</h1>
                    <p class="text-center text-muted mb-4">Enter your credentials to access your account.</p>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Alert for Errors -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Terdapat kesalahan pada login. Silakan coba lagi.</strong>
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <!-- Email Input -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Email *</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Masukkan alamat email Anda">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password Input -->
                        <div class="mb-3">
                            <label for="password" class="form-label">Password *</label>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Masukkan password Anda">
                                <span class="input-group-text">
                                    <i class="fas fa-eye" id="togglePassword" style="cursor: pointer;"></i>
                                </span>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Remember Me and Forgot Password -->
                        <div class="mb-3 form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Ingatkan saya') }}
                            </label>

                            @if (Route::has('password.request'))
                                <a class="btn btn-link float-end text-decoration-none"
                                    href="{{ route('password.request') }}">
                                    {{ __('Lupa Password?') }}
                                </a>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="d-grid mb-3">
                            <button type="submit" class="btn" style="background: #81C408; font-weight: semi-bold">
                                {{ __('Masuk') }}
                            </button>
                        </div>

                        <!-- Register Link -->
                        @if (Route::has('register'))
                            <div class="text-center">
                                <span>Belum punya akun?</span>
                                <a class="text-decoration-none" href="{{ route('register') }}"
                                    style="color: black; font-weight: bold">
                                    {{ __('Daftar') }}
                                </a>
                            </div>
                        @endif
                    </form>

                </div>

                <!-- Image Section -->
                <div class="col-md-6 d-none d-md-block bg-light p-0">
                    <img src="{{ asset('img/login.png') }}" alt="" class="bg-cover h-100 w-100">
                </div>
            </div>
        </div>

        <!-- Bootstrap JS and dependencies -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
        <script>
            const togglePassword = document.querySelector("#togglePassword");
            const password = document.querySelector("#password");

            togglePassword.addEventListener("click", function() {
                // toggle the type attribute
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);

                // toggle the icon
                this.classList.toggle("fa-eye-slash");
            });
        </script>
    </body>

    </html>
@endsection
