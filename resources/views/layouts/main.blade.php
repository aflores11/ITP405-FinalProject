<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body style="background-color:#404040;">
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary fixed-top">
        <div class="container">
            {{-- <div class ="navbar-nav"> --}}
                <a class="nav-item nav-link" style="color: #D4D4D4" href="{{ route('home') }}">HOME</a>
                <a class="nav-item nav-link" style="color: #D4D4D4" href="{{ route('about') }}">ABOUT</a>
                <a class="nav-item nav-link" style="color: #D4D4D4" href="/">RANDOMIZE!</a>
                <a class="nav-item nav-link" style="color: #D4D4D4" href="{{ route('gods') }}">GODS</a>
                @if(Auth::check())
                    <a class="nav-item nav-link" style="color: #D4D4D4" href="{{ route('profile.index') }}">PROFILE</a>    
                    <form method="post" action="{{ route('auth.logout') }}">
                        @csrf
                        <button type="submit" class="nav-item nav-link" style="color: #D4D4D4; background-color: Transparent; border: none;">LOGOUT</button>
                    </form>   
                @else
                    <a class="nav-item nav-link" style="color: #D4D4D4" href="{{ route('auth.loginForm') }}">SIGN IN</a>
                    <a class="nav-item nav-link" style="color: #D4D4D4" href="{{ route('registration.index') }}">REGISTER</a>
                @endif
            {{-- </div> --}}
        </div>
    </nav>
    <div class="container">
            <div style="margin-top: 6%;">
                {{-- <header>
                    <h2>@yield('title')</h2>
                </header> --}}
                @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
                <main>
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @yield('content')
                </main>
            </div>
        
    </div>
</body>
</html>