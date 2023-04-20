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

                                    {{-- Image input --}}
                                    <div class="mb-3 d-flex flex-column justify-content-center align-items-center">
                                        <img id="uploadPreview" src="/assets/img/avatar.png" alt="Avatar"
                                            style="width: 200px; height: 200px; border-radius: 50%;" />
                                        <div>
                                            <input id="uploadImage" type="file" name="profile_pic"
                                                onchange="PreviewImage();" accept="image/png, image/jpeg" />
                                            <span class="text-danger">*
                                                @error('profile_pic')
                                                    {{ $message }}
                                                @enderror
                                            </span>
                                        </div>
                                        <script type="text/javascript">
                                            function PreviewImage() {
                                                var oFReader = new FileReader();
                                                oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

                                                oFReader.onload = function(oFREvent) {
                                                    document.getElementById("uploadPreview").src = oFREvent.target.result;
                                                };
                                            };
                                        </script>
                                    </div>

                                    {{-- Name input --}}
                                    <div class="mb-3 col-6">
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
                                    <div class="mb-3 col-6">
                                        <label for="" class="form-label">Email</label>
                                        <span class="text-danger">*
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ old('email') }}">
                                    </div>

                                    {{-- Gender input --}}
                                    <div class="mb-3 col-6">
                                        <label class="mb-2 pb-1">Gender </label>
                                        <span class="text-danger">*
                                            @error('gender')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <br>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="femaleGender"
                                                value="F" {{ old('gender') == 'F' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="femaleGender">Female</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="maleGender"
                                                value="M" {{ old('gender') == 'M' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="maleGender">Male</label>
                                        </div>

                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="gender" id="otherGender"
                                                value="O" {{ old('gender') == 'O' ? 'checked' : '' }} />
                                            <label class="form-check-label" for="otherGender">Other</label>
                                        </div>
                                    </div>

                                    {{-- DOB input --}}
                                    <div class="mb-3 col-6">
                                        <label for="" class="form-label">Birthday</label>
                                        <span class="text-danger">*
                                            @error('dob')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="date" name="dob" class="form-control"
                                            value="{{ old('dob') }}">
                                    </div>

                                    {{-- Address input --}}
                                    <div class="mb-3 col-6">
                                        <label for="" class="form-label">Address</label>
                                        <span class="text-danger">*
                                            @error('address')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address') }}">
                                    </div>

                                    {{-- City input --}}
                                    <div class="mb-3 col-6">
                                        <label for="" class="form-label">City</label>
                                        <span class="text-danger">*
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" name="city" class="form-control"
                                            value="{{ old('city') }}">
                                    </div>

                                    {{-- State input --}}
                                    <div class="mb-3 col-6">
                                        <label for="" class="form-label">State</label>
                                        <span class="text-danger">*
                                            @error('state')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" name="state" class="form-control"
                                            value="{{ old('state') }}">
                                    </div>

                                    {{-- Country input --}}
                                    <div class="mb-3 col-6">
                                        <label for="" class="form-label">Country</label>
                                        <span class="text-danger">*
                                            @error('country')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" name="country" class="form-control"
                                            value="{{ old('country') }}">
                                    </div>

                                    {{-- Password input --}}
                                    <div class="mb-3 col-6">
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
                                    <div class="mb-3 col-6">
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
