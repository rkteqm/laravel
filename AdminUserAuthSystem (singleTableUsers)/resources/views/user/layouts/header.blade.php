<!doctype html>
<html lang="en">

<head>
    <title>Laravel</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/all.min.css">
    <style>
        .abcde {
            background-color: rgb(230, 74, 126);
        }

        .abcd {
            /* background-color: rgb(233, 30, 99); */
            /* background-color: #009688; */
            background-color: #59b9b0;
        }

        .gradient-custom-4 {
            background: #84fab0;
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));
            border: 0;
        }

        .logo {
            height: 40px;
        }
    </style>

</head>

<body>
    <header>
        <!-- place navbar here -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <ul class="navbar nav">
                    <li class="nav-item">
                        <img src="/assets/img/logo.png" alt="" class="logo">
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('dashboard') }}" class="nav-link navbar-brand text-white">Dashboard</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('trashdata') }}" class="nav-link navbar-brand text-white">Trash</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('logout') }}" class="nav-link navbar-brand text-white">Logout</a>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('login') }}" class="nav-link navbar-brand text-white">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="{{ route('register') }}" class="nav-link navbar-brand text-white">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </header>
