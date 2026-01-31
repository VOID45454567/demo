@extends('layouts.app')
@section('title', 'Вход в админ-панель')
@section('content')
    <form action="{{ route('auth.admin-entry') }}" method="post" class="main">
        @csrf

        @if (session('error'))
            <p class="error">{{ session('error') }}</p>
        @endif
        <h3>Вход в админ-панель</h3>
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
        <button type="submit">Войти</button>
    </form>
@endsection