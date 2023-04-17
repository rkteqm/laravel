@extends('layouts.main')

@section('main-section')
    <div class="container">

        <h1 class="text-center">file upload practice</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        {!! Form::open(['url' => '/customer/storefile', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'px-md-2 mt-4']) !!}
        <div class="row">
            <div class="form-outline mb-4 col-md-6">
                <label class="form-label" for="form3Example1q">Select Image</label>
                <br>
                {!! Form::file('image') !!}
            </div>
            <div class="form-outline mb-4">
                {!! Form::submit('Submit', ['class' => 'btn btn-success btn-lg mb-1']) !!}
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection
