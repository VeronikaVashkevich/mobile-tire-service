@extends('layouts.app')

@section('title', 'Вызовы')

@section('content')
    <div class="container">
        <h1>Все вызовы</h1>
        <a href="{{ route('orders.create') }}" class="btn link-primary">Добавить</a>
        <span class="ml-3">
            Фильтрация по статусу вызова
            <select name="statusSelect" id="statusSelect">
                <option selected="selected" value="all"></option>
                <option value="Создан">Создан</option>
                <option value="Выполняется">Выполняется</option>
                <option value="Завершен">Завершен</option>
                <option value="Отменен">Отменен</option>
            </select>
        </span>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Номер</th>
                <th scope="col">Адрес</th>
                <th scope="col">Телефон</th>
                <th scope="col">Автомобиль</th>
                <th scope="col">Сумма</th>
                <th scope="col">Статус</th>
            </tr>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr class="item" data-status="{{ $order->status }}">
                    <th scope="row">{{ $order->number }}</th>
                    <td>г. {{ $order->city }}, ул. {{ $order->street }} {{ $order->building }}</td>
                    <td>{{ $order->client_phone }}</td>
                    <td>{{ $order->car }}</td>
                    <td>{{ $order->totalSum }}</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $order->status }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item"
                                       href="{{ route('updateOrderStatus', ['order' => $order->id, 'status' => '1']) }}">Создан</a>
                                </li>
                                <li><a class="dropdown-item"
                                       href="{{ route('updateOrderStatus', ['order' => $order->id, 'status' => '2']) }}">Выполняется</a>
                                </li>
                                <li><a class="dropdown-item"
                                       href="{{ route('updateOrderStatus', ['order' => $order->id, 'status' => '3']) }}">Завершен</a>
                                </li>
                                <li><a class="dropdown-item"
                                       href="{{ route('updateOrderStatus', ['order' => $order->id, 'status' => '0']) }}">Отменен</a>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
                <tr class="item" data-status="{{ $order->status }}">
                    <td></td>
                    <td colspan="5">
                        <ul>
                            @foreach($order->services as $service)
                                <li>{{ $service->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            let rows = $('.item');

            function filerValuesByDataKey(selector, dataOption) {
                let value = $(selector).find(":selected").val();
                if (value === 'all') {
                    $(rows).show("400");
                } else {
                    $(rows).hide();
                    $('[data-' + dataOption + '="' + value + '"]').show()
                }
            }

            $('#statusSelect').change(function () {
                filerValuesByDataKey('#statusSelect', 'status')
            })
        })
    </script>
@endsection
