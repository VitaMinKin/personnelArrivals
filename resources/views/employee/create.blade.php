@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            {{ Form::model($employee, ['url' => route('employees.store')]) }}
                @include('employee.form')
                {{ Form::submit('Сохранить') }}
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection
