@extends('layouts.app')

@section('title', 'Админ-панель')
@section('content')
    <div class="all-applications">
        <h3>Заявки</h3>
        <x-applications-list :applications="$applications"></x-applications-list>
    </div>
    <div class="all-users">
        <h3>Пользователи</h3>
        <div class="users">
            <table cellpadding="10" cellspacing="0">
                <thead>
                    <tr>
                        <th>Логин</th>
                        <th>ФИО</th>
                        <th>Номер телефона</th>
                        <th>Создан</th>
                        <th>Кол-во заявок</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->login }}</td>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->created_at->format('d.m.Y H:i') }}</td>
                            <td>{{ $user->applications->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @push('styles')
        <style>
            table {
                width: 80%;
                margin: 0 auto;
                text-align: center;

                tr {
                    border-bottom: 1px solid #868686;

                    td {
                        border-bottom: 1px solid #868686;
                    }
                }
            }
        </style>
    @endpush
@endsection