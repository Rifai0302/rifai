@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/e1766c933e.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <?php
    $page = 'Login'; 
    ?>

    <section class="vh-100">
        <div class="container py-5 h-100">
            <div class="row d-flex align-items-center justify-content-center h-100">
                <div class="col-md-8 col-lg-7 col-xl-6">
                    <img src="{{asset('assets/images/toko2.png')}}"
                        class="img-fluid" alt="gambar">
                </div>

                <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
                    <div class="mt-4">
                        <h2>Selamat Datang di 64mart</h2>
                        <p>Silahkan Masukan akun anda.</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <!-- Email input -->
                        <div class="form-outline mb-4">
                            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                            <label class="form-label" for="email">Email</label>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror"
                                name="password" required autocomplete="current-password" />
                            <label class="form-label" for="password">Kata Sandi</label>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-around align-items-center mb-4">
                            <!-- Checkbox -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }} />
                                <label class="form-check-label" for="remember"> Ingat Saya </label>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" class="btn btn-primary btn-lg btn-block">Masuk</button>
                        <div class="mt-3">
                            <p>Belum punya akun? <a href="{{ route('register') }}">Silakan register</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
