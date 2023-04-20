@extends('layouts.main')
@section('main-section')
    <section class="vh-100 gradient-custom abcd">
        <div class="container h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-12 col-lg-9 col-xl-7">
                    <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                        <div class="card-body p-md-5">
                            <h3 class="pb-md-0 mb-md-5 text-center">Registration Form</h3>
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- Name input --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label">Name</label>
                                        <span class="text-danger">*
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>

                                    {{-- Email input --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label">Email</label>
                                        <span class="text-danger">*
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}">
                                    </div>

                                    {{-- Password input --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label">Password</label>
                                        <span class="text-danger">*
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ old('password') }}">
                                    </div>

                                    {{-- Confirm Password input --}}
                                    <div class="mb-3">
                                        <label for="" class="form-label">Confirm Password</label>
                                        <span class="text-danger">*
                                            @error('confirm_password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="password" name="confirm_password" class="form-control"
                                            value="{{ old('confirm_password') }}">
                                    </div>

                                    <div class="d-flex justify-content-center">
                                        <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">
                                            Register
                                        </button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
