@extends('layouts.app')

@section('sidebar')
    @parent

@endsection

@section('content')

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Сигнал</th>
      <th scope="col">Дата поступления</th>
      <th scope="col">Время поступления</th>
      <th scope="col">Передал</th>
      <th scope="col">Принял</th>
      <th scope="col">Дата-время отмены</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($alerts as $alert)
    <tr>
      <th scope="row">{{ $loop->iteration }} </th>
      <td><a href='{{ route("alertSignals.show", ["id" => $alert->id]) }}'>{{ $alert->alertSignal->caption }} ({{ $alert->alertSignal->code }}) </a></td>
      <td>{{ $alert->begin_date }}</td>
      <td>{{ $alert->begin_time }}</td>
      <td>{{ $alert->reported_officer }} </td>
      <td> {{ $alert->accepted_officer }} </td>
      <td> {{ $alert->cancelled ?? "Действует!" }} </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{ $alerts->links() }}
    
@endsection