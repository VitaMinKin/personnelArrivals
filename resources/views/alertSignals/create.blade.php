@extends('layouts.app')

@section('sidebar')
    @parent

@endsection

@section('content')

    

    {{ Form::model($currentAlert, ["url" => route("alertSignals.store")]) }}
    @include("alertSignals.form")
    <button type="submit" class="btn btn-primary">Начать оповещение личного состава</button>
    {{ Form::close() }}
    
@endsection