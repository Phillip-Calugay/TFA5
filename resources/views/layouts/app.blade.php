<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} | Simple POS</title>
    <link rel="stylesheet" href="{{ asset('css/pos.css') }}">
</head>
<body>
    <header>
        <h1>Simple POS System</h1>
        <nav aria-label="Main navigation">
            <a href="{{ route('home') }}" @if(request()->routeIs('home')) aria-current="page" @endif>Home</a>
            <a href="{{ route('about') }}" @if(request()->routeIs('about')) aria-current="page" @endif>About</a>
            <a href="{{ route('customers') }}" @if(request()->routeIs('customers')) aria-current="page" @endif>Customers</a>
            <a href="{{ route('users') }}" @if(request()->routeIs('users')) aria-current="page" @endif>Users</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>
