@if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @php
        $bootstrapCss = ["class" => "form-control"];
    @endphp

    <div class="form-row">
        <div class="form-group col-md-4">
            {{ Form::label("alert_signal_id", "Поступивший сигнал") }}
            {{ Form::select("alert_signal_id", $signalsList, $currentAlert->alert_signal_id, $bootstrapCss) }}

            @dump($currentAlert->alert_signal_id)
        </div>
        <div class="form-group col-md-4">
            {{ Form::label("begin_date", "Дата поступления") }}
            {{ Form::date("begin_date", $currentAlert->begin_date, $bootstrapCss) }}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label("begin_time", "Время поступления") }}
            {{ Form::time("begin_time", $currentAlert->begin_time, $bootstrapCss) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label("limitation", "Ограничения") }}
        {{ Form::textarea("limitation", $currentAlert->limitation, array_merge($bootstrapCss, ["placeholder" => "Оружие не выдавать, с отпусков не отзывать, и т.д."])) }}
    </div>
    <div class="form-group">
        {{ Form::label("reported_officer", "Кто передал") }}
        {{ Form::text("reported_officer", $currentAlert->reported_officer, array_merge($bootstrapCss, ["placeholder" => "Оперативный дежурный п/п-к Иванов П.А."])) }}
    </div>
    <div class="form-group">
        {{ Form::label("accepted_officer", "Кто принял") }}
        {{ Form::text("accepted_officer", $currentAlert->accepted_officer, array_merge($bootstrapCss, ["placeholder" => "Дежурный по ПУ ЗГТ ст. л-т Мааксимов И.А."])) }}
    </div>