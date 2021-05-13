@extends('layouts.app')

@section('content')

{{ Form::model($employee, ['url' => route('employees.store')]) }}
    @include('employee.form')
    {{ Form::submit('Сохранить') }}
{{ Form::close() }}

@endsection
