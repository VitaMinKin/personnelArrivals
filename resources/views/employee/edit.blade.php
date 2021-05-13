@extends('layouts.app')

@section('content')

{{ Form::model($employee, ['url' => route('employees.update', $employee), 'method' => 'PATCH']) }}
    @include('employee.form')
    {{ Form::submit('Обновить') }}
{{ Form::close() }}

@endsection
