@extends('layouts.app')

@section('title', 'Вызовы')

@section('content')
    <div class="container">
        <h1>Все услуги</h1>
        <a href="{{ route('services.create') }}" class="btn link-primary">Добавить</a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col" class="w-75">Название</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($services as $service)
                <tr>
                    <td>{{ $service->name }}</td>
                    <td>{{ $service->price }} руб.</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
