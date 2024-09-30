<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}</title>

    @vite('resources/less/layouts/html.less')
    @yield('head')
</head>

<body>
    <header>
        <nav>
            <a href="{{ route('home') }}">Клетки</a>
            @if ($request->user())
                <a href="{{ route('new_cage') }}">Создать клетку</a>
                <a href="{{ route('new_animal') }}">Создать животное</a>
            @endif
        </nav>
        <nav>
            @if ($request->user())
                <a href="{{ route('logout_user') }}">Выйти</a>
            @endif
        </nav>
    </header>
    @yield('body')
</body>

</html>
