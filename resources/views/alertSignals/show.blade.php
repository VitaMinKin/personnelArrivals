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
  <p>Дейтсвует с {{ $currentAlert->begin_date }} {{ $currentAlert->begin_time }}</p>
  <p>Ограничения: {{ $currentAlert->limitation }} </p>
  <a class="btn btn-primary btn-lg" href="{{ route('alertSignals.edit', $currentAlert) }}" role="button">Редактировать</a>
  <p> Управление сигналом </p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Отмена сигнала</a>
  <a class="btn btn-primary btn-lg" href="#" role="button">Усиление сигнала</a>
  <a class="btn btn-primary btn-lg" href="#" role="button">Понижение сигнала</a>
  <a class="btn btn-primary btn-lg" href="#" role="button">Оперативная пауза</a>
  <p> Оповещение личного состава </p>
  <a class="btn btn-primary btn-lg" href="#" role="button">Личный состав</a>
</div>
    
@endsection