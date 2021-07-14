@extends('layouts.app')

@section('header')
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
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">
        <table class="table caption-top">
          <caption>список личного состава</caption>
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Воинское звание</th>
              <th scope="col">Фамилия, Имя, Отчество</th>
              <th scope="col">Должность</th>
              <th scope="col">Контактный телефон</th>
              <th scope="col">Время оповещения</th>
              <th scope="col">Время прибытия</th>
            </tr>
          </thead>
          <tbody>
          @foreach ($employees as $employee)
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $employee->military_rank }}</td>
              <td> <a href="{{ route('employees.edit', $employee) }} "> {{ $employee->full_name }}</a></td>
              <td>{{ $employee->position }}</td>
              <td> {{ $employee->contact->mobile_phone_number ?? "Отсутствует" }} </td>
              <td> 
                @php
                  
                  $highAlerts = $employee->highAlerts()->get();
                  
                @endphp

                @if (!$highAlerts->isEmpty())
                  @foreach ($highAlerts as $highAlert)
                    {{ $highAlert->time_alert }}
                  @endforeach
                @else
                  {{ Form::model($employee, ['url' => route('employees.notify', $employee), 'method' => 'PATCH']) }}
                  <div class="col-auto">
                      {{ Form::submit('Оповещен!') }} 
                    </div>
                  {{ Form::close() }} 
                @endif

              </td>
              <td> <form>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Прибыл</button>
                  </div>
                </form> 
                </td>
            </tr>
          @endforeach
          </tbody>
      </table>
    </div>
  </div>
  
</div>

@endsection
