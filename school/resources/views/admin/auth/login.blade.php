<!doctype html>
<html lang="en">

<head>
    <title>School</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/login.css">
    <link href="/assets/css/style.css" rel="stylesheet">

</head>

<body>
    @include('layouts.navbar')
    <section>
        <div class="wrapper">
            <div class="logo">
                <img src="/assets/img/logo.jpg" alt="">
            </div>
            <div class="text-center mt-4 name">
                Super Admin
            </div>
            <form class="p-3 mt-3" method="POST" action="{{ route('admin.login') }}">
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
                    <a href="{{ route('admin.password.request') }}">Forget password?</a>
                @endif
            </div>
        </div>
    </section>
</body>

</html>
