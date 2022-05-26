@extends('layouts.app-sb')

@section('content')
<!-- Outer Row -->
<div class="row justify-content-center">

    <div class="col-lg-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                            </div>

                            @include('sweetalert::alert')

                            @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                <strong> {!! session('error') !!}</strong>
                            </div>
                            @endif

                            @guest
                            <form class="user" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="email"
                                        class="form-control form-control-user @error('email') is-invalid @enderror" id="email" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus
                                        placeholder="{{ __('Email') }}">

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password"
                                        class="form-control form-control-user @error('password') is-invalid @enderror"
                                        id="password" name="password" required autocomplete="current-password"
                                        placeholder="{{ __('Password') }}">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            {{-- <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck" name="remember"
                                                   id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label> 
                        </div> --}}
                   
<br>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        {{ __('Login') }}
                    </button>

                    <hr>

                    </form>
                    <!-- <hr> -->
                    <div class="text-center">
                                    <!-- <a class="small" href="forgot-password.html">Forgot Password?</a> -->
                                </div>
                     @if (Route::has('register'))
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">{{ __('Create an Account!') }}</a>
                </div>
                @endif
                @endguest
            </div>
        </div>
    </div>
</div>
</div>

</div>

</div>
@endsection
