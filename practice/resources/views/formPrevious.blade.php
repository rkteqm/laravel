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
            <div class="mb-3">
                <label for="" class="form-label">Name</label>
                <span class="text-danger">
                    @error('name')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" name="name" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Email</label>
                <span class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </span>
                <input type="text" name="email" id="" class="form-control" placeholder=""
                    aria-describedby="helpId" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Password</label>
                <span class="text-danger">
                    @error('password')
                        {{ $message }}
                    @enderror
                </span>
                <input type="password" name="password" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">
            </div>
            <div class="mb-3">
                <label for="" class="form-label">Confirm Password</label>
                <span class="text-danger">
                    @error('confirm_password')
                        {{ $message }}
                    @enderror
                </span>
                <input type="password" name="confirm_password" id="" class="form-control" placeholder=""
                    aria-describedby="helpId">
            </div>
            <button class="btn btn-primary">
                Submit
            </button>
        </div>
    </form>
</body>

</html>
