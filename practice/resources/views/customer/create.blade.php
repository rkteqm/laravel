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

                                    <x-input type="text" name="name" label="Name" />
                                    <x-input type="text" name="email" label="Email" />
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
                                    <x-input type="date" name="dob" label="Birthday" />
                                    <x-input type="text" name="address" label="Address" />
                                    <x-input type="text" name="city" label="City" />
                                    <x-input type="text" name="state" label="State" />
                                    <x-input type="text" name="country" label="Country" />
                                    <x-input type="password" name="password" label="Password" />
                                    <x-input type="password" name="confirm_password" label="Confirm Password" />
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
