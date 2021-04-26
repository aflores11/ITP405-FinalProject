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
    <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">HOME</a>
            <a class="navbar-brand" href="/">RANDOMIZE!</a>
            <a class="navbar-brand" href="{{ route('gods') }}">GODS</a>
            <a class="navbar-brand" href="/">SIGN IN</a>
        </div>
    </nav>
    <div class="container">
            <div>
                <header>
                    <h2>@yield('title')</h2>
                </header>
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