@extends('layouts.app')
@section('title', 'Главная')
@section('content')
    <h1>Тут Главная</h1>

    <div class="slider-section">

        <div class="image" id="image"></div>
    </div>
    @push('scripts')
        <script>
            const image = document.getElementById('image')
        </script>
    @endpush
@endsection