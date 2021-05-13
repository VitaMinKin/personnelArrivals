@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{ Form::label('military_rank', 'Воинское звание') }}
{{ Form::text('military_rank') }}<br>
{{ Form::label('full_name', 'Фамилия, Имя, Отчество (полностью)') }}
{{ Form::text('full_name') }}<br>
{{ Form::label('position', 'Должность') }}
{{ Form::text('position') }}<br>
