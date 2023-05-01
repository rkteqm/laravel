@extends('school.layouts.main')

@section('main-section')
    <!-- main-panel start -->
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Add New Article</h4>
                            <p class="card-description">
                                Post your article
                            </p>
                            <form class="forms-sample" method="POST" action="{{ route('school.addarticle') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputCity1">Article Image</label>
                                    <span class="text-danger far fa-user">
                                        @error('image')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="file" name="image" value="{{ old('image') }}" class="form-control"
                                        id="exampleInputName1" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Title</label>
                                    <span class="text-danger far fa-user">
                                        @error('title')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <input type="text" name="title" value="{{ old('title') }}" class="form-control"
                                        id="exampleInputName1" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputCity1">Body</label>
                                    <span class="text-danger far fa-user">
                                        @error('body')
                                            {{ $message }}
                                        @enderror
                                    </span>
                                    <textarea name="body" class="form-control" rows="4">{{ old('body') }}</textarea>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.
                    Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin
                        template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made
                    with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- main-panel ends -->
@endsection
