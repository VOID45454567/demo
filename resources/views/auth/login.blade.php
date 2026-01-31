@extends('layouts.app')
@section('title', 'Авторизация')
@section('content')
    <form action="{{ route('auth.login') }}" method="post" class="main">
        @csrf
        <h3>Авторизация</h3>
        <div class="form-control">
            <label for="login">Логин</label>
            <input type="text" name="login" value="{{ old('login') }}">
            @error('login')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-control">
            <label for="password">Пароль</label>
            <input type="text" name="password" value="{{ old('password') }}">
            @error('password')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <p>Нет аккаунта? <a href="{{ route('auth.register-page') }}">Зарегистрироваться</a></p>
        <button type="submit">Авторизация</button>
    </form>
@endsection