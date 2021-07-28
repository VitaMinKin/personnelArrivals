@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="form-row">
    <div class="form-group col-md-6">
        {{ Form::label('military_rank', 'Воинское звание') }}
        {{ Form::text('military_rank', $employee->military_rank, ["class" => "form-control"]) }}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('full_name', 'Фамилия, Имя, Отчество (полностью)') }}
        {{ Form::text('full_name', $employee->full_name, ["class" => "form-control"]) }}
    </div>
  </div>
  <div class="form-group">
        {{ Form::label('position', 'Должность') }}
        {{ Form::text('position', $employee->position, ["class" => "form-control"]) }}
  </div>
  <div class="form-group">
        {{ Form::label('mobile_phone_number', 'Номер мобильного телефона') }}
        {{ Form::text('mobile_phone_number', $employee->contact->mobile_phone_number ?? "", ["class" => "form-control"]) }}
  </div>

  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Данные проверены!
      </label>
    </div>
  </div>
