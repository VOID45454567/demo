@extends('layouts.app')
@section('title', 'Регистрация')
@section('content')
    <form action="{{ route('auth.register') }}" method="post" class="main">
        @csrf
        <h3>Регистрация</h3>
        <div class="form-control">
            <label for="full_name">ФИО</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}">
            @error('full_name')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-control">
            <label for="login">Логин</label>
            <input type="text" name="login" value="{{ old('login') }}">
            @error('login')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-control">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ old('email') }}">
            @error('email')
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
        <div class="form-control">
            <label for="phone_number">Номер телефона</label>
            <input type="text" name="phone_number" value="{{ old('phone_number') }}">
            @error('phone_number')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <p>Есть аккаунт <a href="{{ route('auth.login-page') }}">Авторизоваться</a></p>
        <button type="submit">Регистрация</button>
    </form>
@endsection