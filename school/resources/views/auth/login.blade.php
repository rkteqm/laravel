@extends('layouts.main')

@section('main-section')
    <section class="vh-100 gradient-custom abcd">
        <div class="wrapper">
            <div class="logo">
                <img src="/assets/img/logo.jpg"
                    alt="">
            </div>
            <div class="text-center mt-4 name">
                User
            </div>
            <form class="p-3 mt-3">
                <div class="form-field d-flex align-items-center">
                    <span class="far fa-user"></span>
                    <input type="text" name="userName" id="userName" placeholder="Username">
                </div>
                <div class="form-field d-flex align-items-center">
                    <span class="fas fa-key"></span>
                    <input type="password" name="password" id="pwd" placeholder="Password">
                </div>
                <button class="btn mt-3">Login</button>
            </form>
            <div class="text-center fs-6">
                <a href="#">Forget password?</a>
            </div>
        </div>
    </section>
@endsection
