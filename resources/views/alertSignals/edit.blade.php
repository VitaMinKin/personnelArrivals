@extends('layouts.app')

@section('sidebar')
    @parent

@endsection

@section('content')

    

    {{ Form::model($currentAlert, ["url" => route('alertSignals.update', $currentAlert), "method" => "PATCH"] ) }}
    @include("alertSignals.form")
    <button type="submit" class="btn btn-primary">Сохранить изменения</button>
    {{ Form::close() }}
    
@endsection