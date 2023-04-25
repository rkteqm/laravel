<!doctype html>
<html lang="en">

<head>
    <title>Customers</title>
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
                    <li class="nav-item">
                        <a href="/" class="nav-link navbar-brand text-white">Home</a>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item" role="presentation">
                                <a href="/customer" class="nav-link navbar-brand text-white">Customers</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="{{ url('customer/trashdata') }}" class="nav-link navbar-brand text-white">Trash</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link navbar-brand text-white">
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit">Logout</button>
                                    </form>
                                </a>
                            </li>
                        @else
                            <li class="nav-item" role="presentation">
                                <a href="{{ url('customer/login') }}" class="nav-link navbar-brand text-white">Login</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a href="/customer/create" class="nav-link navbar-brand text-white">Register</a>
                            </li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </header>
