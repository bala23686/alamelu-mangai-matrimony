@extends('layouts.Admin.auth')

@section('auth_section')
    <h5 class="title">Login</h5>
    <form action="/login" method="POST">
        <div class="form-group">
            <label>Email</label>
            <input name="email" type="email">
        </div>
        <div class="form-group">
            <label>Password</label>
            <input name="password" type="password">
        </div>
        <div class="check-and-pass">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input width-auto" id="exampleCheck1" name="remember" value="true">
                        <label class="form-check-label">Remember me</label>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <a href="javascript:void(0)" class="lost-pass">Lost your
                        password?</a>
                </div>
            </div>
        </div>
        @csrf
        <div class="button">
            <button type="submit" class="btn">Login Now</button>
        </div>
        <p class="outer-link">Don't have an account? <a href="/">Register
                here</a>
        </p>
    </form>
@endsection
@section('scripts')
@endsection
