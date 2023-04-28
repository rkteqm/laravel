@extends('layouts.main')

@section('main-section')
    <section class="vh-100 gradient-custom abcd">
        <div class="wrapper">
            <div class="logo">
                <img src="/assets/img/logo.jpg" alt="">
            </div>
            <div class="text-center mt-4 name">
                Staff Login
            </div>
            <form class="p-3 mt-3" method="POST" action="{{ route('login') }}">
                @csrf
                <span class="text-danger far fa-user">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
                <div class="form-field d-flex align-items-center">
                    <input class="text-center" type="email" name="email" placeholder="Username"
                        value="{{ old('email') }}">
                </div>
                <span class="text-danger far fa-user">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
                <div class="form-field d-flex align-items-center">
                    <input class="text-center" type="password" name="password" placeholder="Password">
                </div>
                <button class="btn mt-3">Login</button>
            </form>
            <div class="text-center fs-6">
                @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">Forget password?</a>
                @endif
                or
                @if (Route::has('register'))
                    <a href="{{ route('register') }}">Sign up</a>
                @endif
            </div>
        </div>
    </section>
@endsection
