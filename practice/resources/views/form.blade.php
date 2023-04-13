<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/all.min.css">

</head>

<body>
    <form action="{{ url('/') }}/register" method="POST">
        @csrf
        {{-- <pre>
            @php
                print_r($errors->all());
            @endphp
        </pre> --}}
        <div class="container">
            <h1 class="text-center">Registration</h1>

            {{-- rendering inputs using Input component --}}
            <x-input type="text" name="name" label="Name" />
            <x-input type="text" name="email" label="Email" />
            <x-input type="password" name="password" label="Password" />
            <x-input type="password" name="confirm_password" label="Confirm Password" />
            
            <button class="btn btn-primary">Submit</button>
        </div>
    </form>
</body>

</html>
