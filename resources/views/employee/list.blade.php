@extends('layouts.app')

@section('sidebar')
    @parent

@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col">

        <div class="dropdown d-flex justify-content-end">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Управление разделом
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{ route('employees.create') }}">Создать карточку должностного лица</a>
            </div>
        </div>

        <h4 class="text-center text-uppercase"> Список личного состава</h4>

        <table class="table caption-top">
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

                  $highAlerts = $employee->highAlerts()->whereDate("time_alert", \Carbon\Carbon::today()->toDateString())->get();


                @endphp

                @if (!$highAlerts->isEmpty())

                  @foreach ($highAlerts as $alert)
                    {{ $alert->time_alert }}
                  @endforeach

                @else

                  {{ Form::model($employee, ['url' => route('employees.notify', $employee), 'method' => 'PATCH']) }}
                  <div class="col-auto">
                      {{ Form::submit('Оповещен!') }}
                    </div>
                  {{ Form::close() }}

                @endif

              </td>
              <td>
                @php
                    if (!$highAlerts->isEmpty()) {
                        foreach ($highAlerts as $alert) {
                            if ($alert->arrivals_time) {
                                echo $alert->arrivals_time;
                            }
                            else {
                                echo Form::model($employee, ['url' => route('employees.arrived', ['id' => $employee->id, 'arrivalId' => $alert->id]), 'method' => 'PATCH']);
                                echo "<div class='col-auto'>";
                                echo Form::submit('Прибыл!');
                                echo "</div>";
                                echo Form::close();
                            }
                        }
                    } else {
                        echo "Сначала необходимо оповестить!";
                    }
                @endphp


              </td>
            </tr>
          @endforeach
          </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
