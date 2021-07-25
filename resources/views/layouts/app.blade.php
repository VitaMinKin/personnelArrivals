<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ArrivalsControl</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('js/app.js') }}"></script>
    </head>
    <body>
        <div class="mb-5"> @section('sidebar')
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
                <a class="navbar-brand" href="#"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Управление СЗГТ <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Отделения СЗГТ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Секретное отделение</a>
                        <a class="dropdown-item" href="#">Отделение ОРС</a>
                        <a class="dropdown-item" href="#">Отделение обработки информации</a>
                        <a class="dropdown-item" href="#">Отделение защиты информации</a>
                        <a class="dropdown-item" href="#">Отделение СОПКА</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Весь личный состав СЗГТ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Управление 882 ЦЗИ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Отделения 882 ЦЗИ
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Секретное отделение</a>
                        <a class="dropdown-item" href="#">Отдел ОШИ</a>
                        <a class="dropdown-item" href="#">Отдел ОБИ</a>
                        <a class="dropdown-item" href="#">Отдел ТЗИ</a>
                        <a class="dropdown-item" href="#">Отделение Спецаппаратных</a>
                        <a class="dropdown-item" href="#">Отделение ХТСС</a>
                        <a class="dropdown-item" href="#">Отделение ПКД</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Весь личный состав 882 ЦЗИ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('employees.create') }}">Создать карточку должностного лица</a>
                    </li>
                    </ul>
                </div>
            </nav>

            
        @show
        </div>
        <div class="container-fluid pt-5">

            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>
