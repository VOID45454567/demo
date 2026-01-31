@extends('layouts.app')
@section('title', 'Создание заявки')
@section('content')
    <form action="{{ route('applications.store-application') }}" method="post">
        @csrf
        <h3>Создание заявки</h3>
        <div class="form-control">
            <label for="course">Тема</label>
            <select name="course_id">
                <option value="0">Выбирите</option>
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
            </select>
            @error('course_id')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-control">
            <label for="prefer_date">Желаемая дата</label>
            <input type="date" name="prefer_date" value="{{ old('prefer_date') }}">
            @error('prefer_date')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-control">
            <label for="payment_method">Способ оплаты</label>
            <select name="payment_method">
                <option value="0">Выбирите</option>
                <option value="by_number">По номеру телефона</option>
                <option value="cash">Наличные</option>
            </select>
            @error('payment_type')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Создать</button>
    </form>
@endsection