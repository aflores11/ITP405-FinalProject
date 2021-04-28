@extends('layouts.main')

@section('title', 'Login')

@section('content')
    <div class = "d-flex flex-column">
        <div style="background-color:#6E6E6E;" class = "p-5 m-5">
            <p>Don't have an account? Please <a style = "color:#d4d4d4;" href="{{ route('registration.index') }}">register</a>.</p>
            <form method="post" action="{{ route('auth.login') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control">
                </div>
                <input type="submit" value="Login" class="btn btn-primary">
            </form>   
        </div>
    </div>
@endsection