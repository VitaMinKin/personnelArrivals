@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{ Form::model($employee, ['url' => route('employees.update', $employee), 'method' => 'PATCH']) }}
            @include('employee.form')

            {{ Form::submit('Обновить') }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
