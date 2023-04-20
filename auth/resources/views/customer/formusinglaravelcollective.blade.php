@extends('layouts.main')

@section('main-section')
    <div class="container">

        <h1 class="text-center">form using laravel collective</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {!! Form::open(['url' => '', 'method' => 'POST', 'class' => 'px-md-2 mt-4']) !!}
        <div class="row">
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Select Profile Image</label>
                <br>
                {!! Form::file('image') !!}
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Name</label>
                {!! Form::text(
                    'name',
                    $value = null,
                    $attributes = [
                        'name' => 'name',
                        'class' => 'form-control',
                    ],
                ) !!}
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Email</label>
                {!! Form::email(
                    'name',
                    $value = null,
                    $attributes = [
                        'name' => 'email',
                        'class' => 'form-control',
                        'placeholder' => 'abc@example.com',
                    ],
                ) !!}
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Password</label>
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Phone Number</label>
                {!! Form::number('phone', null, ['class' => 'form-control']) !!}
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Gender</label>
                <br>
                {!! Form::radio('gender', 'M') !!}Male
                {!! Form::radio('gender', 'F') !!}Female
                {!! Form::radio('gender', 'O') !!}Other
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">City</label>
                <br>
                @php
                    $cities = ['CDG' => 'CDG', 'PKL' => 'PKL', 'UMB' => 'UMB'];
                @endphp
                {!! Form::select('city', $cities, 'PKL', [
                    'class' => 'form-control',
                ]) !!}
            </div>
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Country</label>
                <br>
                {!! Form::select('country', ['India' => 'India', 'USA' => 'USA', 'UAE' => 'UAE'], null, [
                    'class' => 'form-control',
                ]) !!}
            </div>
            <div class="form-outline mb-4">
                {!! Form::checkbox('name', 'value') !!}
                <label class="form-label" for="form3Example1q">Subscribe</label>
            </div>
            <div class="form-outline mb-4">
                {!! Form::checkbox('name', 'value', true) !!}
                <label class="form-label" for="form3Example1q">Terms & Condition</label>
            </div>
            <div class="form-outline mb-4">
                {!! Form::submit('Submit', ['class' => 'btn btn-success btn-lg mb-1']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
