<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap-grid.min.css"
        integrity="sha512-Aa+z1qgIG+Hv4H2W3EMl3btnnwTQRA47ZiSecYSkWavHUkBF2aPOIIvlvjLCsjapW1IfsGrEO3FU693ReouVTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Laravel</title>
</head>

<body>
    {{-- for echo printing in laravel --}}
    <h1>
        Welcome!
        <!-- its only print html -->
        {{ $name ?? 'Guest' }}
    </h1>

    {{-- isset in laravel --}}
    <h2>
        @isset($name)
            Welcome! {{ $name }}
        @endisset
    </h2>

    <br>

    {{-- @if, @elseif, @else, @endif --}}
    @if ($name == '')
        {{ 'Name is empty' }}
    @elseif($name != 'Rahul Kumar')
        {{ 'Name is not correct' }}
    @else
        {{ 'Name is correct' }}
    @endif

    <br>

    {{-- @unless, @endunless --}}
    @unless ($name == 'Rahul Kumar')
        This name is not equal Rahul Kumar
    @endunless

    {{-- @for, @endfor --}}
    <div class="container">
        @for ($i = 0; $i < 5; $i++)
            {{ $i }}
        @endfor
    </div>

    {{-- @php, @endphp, @while, @endwhile --}}
    @php
        $i = 1;
    @endphp
    @while ($i <= 5)
        {{ $i }}
        @php
            $i++;
        @endphp
    @endwhile

    <!-- It is print as well as execute html -->
    {!! $demo !!}

    {{-- @foreach, @endforeach --}}
    @php
        $countries = ['India', 'Afghanistan', 'Albania', 'Algeria', 'American Samoa', 'Andorra', 'Angola', 'Anguilla', 'Antarctica', 'Antigua and Barbuda', 'Argentina', 'Armenia', 'Aruba', 'Australia', 'Austria', 'Azerbaijan', 'Bahamas', 'Bahrain', 'Bangladesh', 'Barbados', 'Belarus', 'Belgium', 'Gabon', 'Gambia', 'Georgia', 'Germany', 'Ghana', 'Gibraltar', 'Greece', 'Greenland', 'Grenada', 'Guadeloupe', 'Guam', 'Guatemala', 'Guinea', 'Guinea-Bissau', 'Guyana', 'Haiti', 'Heard and Mc Donald Islands', 'Holy See (Vatican City State)', 'Honduras', 'Hong Kong', 'Hungary', 'Iceland', 'India', 'Indonesia', 'Iran (Islamic Republic of)', 'Iraq', 'Ireland', 'Israel', 'Italy', 'Jamaica', 'Japan', 'Jordan', 'Kazakhstan', 'Kenya', 'Vietnam', 'Virgin Islands (British)', 'Virgin Islands (U.S.)', 'Wallis and Futuna Islands', 'Western Sahara', 'Yemen', 'Yugoslavia', 'Zambia', 'Zimbabwe'];
    @endphp
    <select name="country" id="">
        @foreach ($countries as $key => $country)
            <option value="{{ $key }}">{{ $country }}</option>
        @endforeach
    </select>

    {{-- continue --}}
    <h4>
        {{ 7 }} is skipped
    </h4>
    @for ($i = 0; $i < 15; $i++)
    @if ($i == 7)
    @continue
    @endif
    {{ $i }}
    @endfor
    
    {{-- break --}}
    <h4>
        after {{ 7 }} break
    </h4>
    @for ($i = 0; $i < 15; $i++)
        @if ($i == 7)
            @break
        @endif
        {{ $i }}
    @endfor
</body>

</html>
