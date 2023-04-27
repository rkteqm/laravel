<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $mailData['title'] }}</title>
</head>

<body>
    <h1>{{ $mailData['title'] }}</h1>
    <h2>{{ $mailData['body'] }}</h2>
    <h6>Username: {{ $mailData['username'] }}</h6>
    <h6>Password: {{ $mailData['password'] }}</h6>
    <p>Visit your school: <a href="{{ $mailData['link'] }}">Click here</a></p>
    <p>Thank You.</p>
</body>

</html>
