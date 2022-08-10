@extends('Website.layouts.auth')


@section('content')
    <div class="px-4 py-5 my-5 text-center">
        <h1 class="display-6 fw-bold">Login</h1>
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <ul>
                    {!! implode('', $errors->all('<li class="text-danger">:message</li>')) !!}
                </ul>
            @endif
            <form class="p-4 p-md-5 border rounded-3 bg-light" action="{{ route('sign.in') }}" method="post">
                @csrf
                <div class="mb-3 mt-2">
                    <label for="exampleFormControlInput1" class="form-label">Email</label>
                    <input class="form-control" type="text" placeholder="Email" aria-label="default input example">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Password</label>
                    <input class="form-control" type="text" placeholder="Password" aria-label="default input example">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
            </form>
        </div>
    </div>
@endsection
