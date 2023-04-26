@extends('admin.layouts.main')

@section('main-section')
    <!-- main-panel start -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New School</h4>
                            <p class="card-description">
                                Basic School Details
                            </p>
                            <form class="forms-sample" enctype="multipart/form-data" method="post"
                                action="{{ route('admin.addschool') }}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">School Logo</label>
                                        <span class="text-danger far fa-user">
                                            @error('logo')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="file" name="logo" accept="image/png" class="form-control" id=""
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputName1">School Name</label>
                                        <span class="text-danger far fa-user">
                                            @error('name')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputName1"
                                            placeholder="Name">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputEmail3">Email address</label>
                                        <span class="text-danger far fa-user">
                                            @error('email')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control" id="exampleInputEmail3"
                                            placeholder="Email">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputPassword4">Password</label>
                                        <span class="text-danger far fa-user">
                                            @error('password')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="password" name="password" value="{{ old('password') }}" class="form-control"
                                            id="exampleInputPassword4" placeholder="Password">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleSelectGender">Institution Type</label>
                                        <span class="text-danger far fa-user">
                                            @error('type')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <select class="form-control" name="type" id="exampleSelectGender">
                                            <option selected disabled>Select</option>
                                            <option value="G" {{ old('type') == 'G' ? 'selected' : '' }}>Government</option>
                                            <option value="P" {{ old('type') == 'P' ? 'selected' : '' }}>Private</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="exampleInputCity1">City</label>
                                        <span class="text-danger far fa-user">
                                            @error('city')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <input type="text" name="city" value="{{ old('city') }}" class="form-control" id="exampleInputCity1"
                                            placeholder="Location">
                                    </div>
                                    <div class="form-group col-12">
                                        <label for="exampleTextarea1">Description</label>
                                        <span class="text-danger far fa-user">
                                            @error('description')
                                                {{ $message }}
                                            @enderror
                                        </span>
                                        <textarea class="form-control" name="description" id="exampleTextarea1" rows="4">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-panel ends -->
@endsection
