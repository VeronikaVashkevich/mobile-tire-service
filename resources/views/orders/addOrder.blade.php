@extends('layouts.app')

@section('title', 'Добавить вызов')

@section('content')
    <div class="container pb-5 d-flex justify-content-center">
        <div class="w-75 ">
            <h1 class="text-center">Добавить вызов</h1>
            <form method="post" action="{{ route('orders.store') }}">
                @csrf
                @method('POST')
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="mb-3">
                    <label for="number" class="form-label">Номер заказа</label>
                    <input type="text" class="form-control" id="number" name="number" value="{{@old('number')}}">
                </div>

                <div class="mb-3">
                    <label for="client_phone" class="form-label">Телефон клиента</label>
                    <input type="text" class="form-control" id="client_phone" name="client_phone"
                           value="{{@old('client_phone')}}">
                </div>

                <div class="mb-3">
                    <label for="city" class="form-label">Адрес, город</label>
                    <input type="text" class="form-control" id="city" name="city" value="{{@old('city')}}">
                </div>

                <div class="mb-3">
                    <label for="street" class="form-label">Адрес, улица</label>
                    <input type="text" class="form-control" id="street" name="street" value="{{@old('street')}}">
                </div>

                <div class="mb-3">
                    <label for="building" class="form-label">Адрес, дом (строение)</label>
                    <input type="number" class="form-control" id="building" name="building" value="{{@old('building')}}"
                           step="1">
                </div>

                <div class="mb-3">
                    <label for="car" class="form-label">Автомобиль</label>
                    <input type="text" class="form-control" id="car" name="car" value="{{@old('car')}}">
                </div>

                <div class="mb-3">
                    <label for="services" class="form-label">Услуги</label>
                    <select name="services[]" id="services" multiple="multiple" class="form-control multi-select">
                        @foreach($services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#services').selectpicker();
        })
    </script>
@endsection
