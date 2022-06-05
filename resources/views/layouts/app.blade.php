<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/js/bootstrap-select.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">
    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta3/css/bootstrap-select.min.css">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
@section('header')
    <div class="container">
        <header class="d-flex justify-content-center py-3">
            <ul class="nav nav-pills">
                <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Главная</a></li>
                {{--                <li class="nav-item dropdown">--}}
                {{--                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"--}}
                {{--                       data-bs-toggle="dropdown" aria-expanded="false">--}}
                {{--                        Документы--}}
                {{--                    </a>--}}
                {{--                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">--}}
                {{--                        <li><a class="dropdown-item" href="{{ route('templates', ['template' => 'form1']) }}">Форма--}}
                {{--                                1</a></li>--}}
                {{--                    </ul>--}}
                {{--                </li>--}}
                @auth
                    <li class="nav-item"><a href="{{ route('services.index') }}" class="nav-link" aria-current="page">Услуги</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('orders.index') }}" class="nav-link" aria-current="page">Вызовы</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link" aria-current="page">Выйти</a>
                    </li>
                @else
                    <li class="nav-item"><a href="{{ route('login') }}" class="nav-link" aria-current="page">Войти</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('register') }}" class="nav-link" aria-current="page">Регистрация</a>
                    </li>
                @endauth
            </ul>
        </header>
    </div>
@show
@section('content')

@show
</body>
</html>
