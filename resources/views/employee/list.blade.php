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
            </tr>
          @endforeach
          </tbody>
      </table>
    </div>
  </div>

</div>

@endsection
