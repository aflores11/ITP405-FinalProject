@extends('layouts.main')

@section('title', 'Register')

@section('content')
    <div class = "d-flex flex-column">
        <div style="background-color:#6E6E6E;" class = "p-5 m-5">
            <p>Already have an account? Please <a style="color:#d4d4d4;" href="{{ route('auth.loginForm') }}">Login</a>.</p>
            <form method="post" action="{{ route('register') }}">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input type="text" 
                        id="username" 
                        name="username" 
                        class="form-control" p
                        laceholder="Username"
                        value="{{ old('username') }}">
                    @error('username')
                        <small class="text-danger bg-light">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="email">Email</label>
                    <input 
                        type="email" 
                        id="email" 
                        name="email" 
                        class="form-control" 
                        placeholder="example@domain"
                        value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger bg-light">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input type="password" 
                        id="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="password"
                        value="{{ old('password') }}">
                    @error('password')
                        <small class="text-danger bg-light">{{ $message }}</small>
                    @enderror
                </div>
                <input type="submit" value="Register" class="btn btn-primary">
            </form>
        </div>
    </div>
@endsection