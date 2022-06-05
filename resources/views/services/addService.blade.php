@extends('layouts.app')

@section('title', 'Добавить услугу')

@section('content')
    <div class="container pb-5 d-flex justify-content-center">
        <div class="w-75 ">
            <h1 class="text-center">Добавить услугу</h1>
            <form method="post" action="{{ route('services.store') }}">
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
                    <label for="name" class="form-label">Название услуги</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{@old('name')}}">
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена услуги</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{@old('price')}}" step="0.01">
                </div>

                <button type="submit" class="btn btn-success">Сохранить</button>
            </form>
        </div>
    </div>
@endsection
