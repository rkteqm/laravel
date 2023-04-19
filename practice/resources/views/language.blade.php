<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/all.min.css">

</head>

<body class="antialiased">

</body>
<nav>
    <div class="container">
        <h1>Change language of website in laravel</h1>
        <ul>
            <li><a href="{{ url('/language') }}">English</a></li>
            <li><a href="{{ url('/language/hi') }}">Hindi</a></li>
            <li><a href="{{ url('/language/guj') }}">Gujrati</a></li>
            <li><a href="{{ url('/language/rus') }}">Russian</a></li>
        </ul>
</nav>
<h2 class="text-center mt-4">@lang('lang.welcome')</h2>
</div>

</html>
