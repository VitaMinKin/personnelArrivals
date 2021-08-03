@extends('layouts.app')

@section('sidebar')
    @parent

@endsection

@section('content')

<div class="jumbotron">
  <p class="lead"> Действующая степень боевой готовности </p>
  <h1 class="display-4">{{ $currentAlert->alertSignal->caption }}</h1>
  <p class="lead"> Код сигнала - {{ $currentAlert->alertSignal->code }} </p>
  <p class="m-0 p-0">Передал сигнал: {{ $currentAlert->reported_officer }} </p>
  <p class="m-0 p-0">Получил сигнал: {{ $currentAlert->accepted_officer }} </p>
  <hr class="my-4">

  <a class="btn btn-primary btn-lg" href="{{ route('alertSignals.edit', $currentAlert) }}" role="button">Изменить</a>

    @if(!$currentAlert->cancelled)

        <p>Дейтсвует с {{ $currentAlert->begin_date }} {{ $currentAlert->begin_time }}</p>

        <p> Управление сигналом </p>

            {{ Form::model($currentAlert, ['url' => route('alertSignals.cancel', ["id" => $currentAlert->id]), 'method' => 'PATCH']) }}
                <div class="col-auto">
                    {{ Form::submit('Отмена сигнала!', ["class" => "btn btn-primary btn-lg"]) }}
                </div>
            {{ Form::close() }}
    @else
        <p><b>Объявлен:</b> {{ $currentAlert->begin_date }} {{ $currentAlert->begin_time }}; <b>Отменен:</b> {{ $currentAlert->cancelled }}</p>

    @endif


  <p>Ограничения: {{ $currentAlert->limitation }} </p>
  <p> Оповещение личного состава </p>
  <a class="btn btn-primary btn-lg" href="{{ route('alertSignals.employees', ['alertId' => $currentAlert->id]) }}" role="button">Оповещение личного состава</a>
</div>

@endsection
