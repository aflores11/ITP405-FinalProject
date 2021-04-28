@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class = "d-flex flex-column">
        <div style="background-color:#6E6E6E;" class = "p-5 m-5">
            <p>Already have an account? Please <a style="color:#d4d4d4;" href="{{ route('auth.loginForm') }}">Login</a>.</p>
            <form method="post" action="{{ route('registration.create') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="name">Full Name</label>
                    <input type="text" id="name" name="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <input type="submit" value="Register" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection