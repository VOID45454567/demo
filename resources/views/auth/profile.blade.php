@extends('layouts.app')
@section('title', auth()->user()->login)
@section('content')
    <div class="user-info">
        <h1>{{ auth()->user()->login }}</h1>
        <h4>Мои данные</h4>
        <div class="add-info">
            <p>ФИО: <span>{{ auth()->user()->full_name }}</span></p>
            <p>Email: <span>{{ auth()->user()->email }}</span></p>
            <p>Номер телефона: <span>{{ auth()->user()->phone_number }}</span></p>
        </div>

    </div>
    <div class="my-applications">
        <h1>Мои заявки
        </h1>
        @if (count(auth()->user()->Applications->toArray()) !== 0)
            <x-applications-list :applications="auth()->user()->Applications">
        </x-applications-list> @else <p>У вас пока нет
            заявок <a href="{{ route('applications.create') }}">Создать</a> </p>
        @endif
        @if (count(auth()->user()->Applications->toArray()) !== 0)
            <a href="{{ route('applications.create') }}">Создать</a>
        @endif
        <form method="post" action="{{ route('auth.logout') }}">
            @csrf
            <button type="submit">Выйти</button>
        </form>
    </div>
    @push('styles')
        <style>
            .applications {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                gap: 10px;

                .application {
                    width: 49%;
                    border: 1px solid #3498db;
                    padding: 10px;
                    border-radius: 10px;
                }
            }

            .add-info {
                display: flex;
                justify-content: space-around;
                background-color: #3498db26;
                padding-top: 40px;
                padding-bottom: 40px;
                border-radius: 20px;
                border: 2px solid #3498db;
                margin-bottom: 20px;

                span {
                    color: #3498db;
                }


            }
        </style>
    @endpush
@endsection