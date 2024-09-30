@extends('layouts.html')

@section('head')
    @parent
    @vite('resources/less/login.less')
@endsection

@section('body')
    <main>
        <section>
            <form class="login" action="{{ route('login_user') }}" method="POST">
                @csrf
                <input name="email" required type="email" maxlength="200" placeholder="ваша@почта.ру"
                    value="{{ old('email') }}">
                <input name="password" required type="password" maxlength="200" placeholder="Пароль">
                <input type="submit" value="Войти">
            </form>
            @if ($errors->any())
                <ul class="errors">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </section>
    </main>
@endsection
