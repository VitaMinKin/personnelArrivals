@extends('layouts.app')

@section('header')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Управление СЗГТ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Отделения СЗГТ
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Секретное отделение</a>
          <a class="dropdown-item" href="#">Отделение ОРС</a>
          <a class="dropdown-item" href="#">Отделение обработки информации</a>
          <a class="dropdown-item" href="#">Отделение защиты информации</a>
          <a class="dropdown-item" href="#">Отделение СОПКА</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Весь личный состав СЗГТ</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Управление 882 ЦЗИ</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Отделения 882 ЦЗИ
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Секретное отделение</a>
          <a class="dropdown-item" href="#">Отдел ОШИ</a>
          <a class="dropdown-item" href="#">Отдел ОБИ</a>
          <a class="dropdown-item" href="#">Отдел ТЗИ</a>
          <a class="dropdown-item" href="#">Отделение Спецаппаратных</a>
          <a class="dropdown-item" href="#">Отделение ХТСС</a>
          <a class="dropdown-item" href="#">Отделение ПКД</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Весь личный состав 882 ЦЗИ</a>
      </li>
    </ul>
  </div>
</nav>
@endsection

@section('content')
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-4 row-cols-xl-6">

    @foreach ($employees as $employee)
    <div class="col p-1">
        <div class="card">
            <div class="card-header text-muted">
                {{ $employee->position }}
            </div>
            <!-- <img src="{{ asset('storage/images/noPhoto.jpg') }}" class="card-img-top" alt="no photo"> -->

            <div class="card-body">
                    <h6 class="card-title my-0">{{ $employee->military_rank }}</h6>
                <h5 class="card-title my-0">{{ $employee->full_name }}
                <p class="card-text border-top border-bottom py-2 mb-1">FROM TABLE STATUS</p>

                <div class="btn-group d-flex">
                    <button type="button" class="btn btn-danger">Никого не пускать!</button>
                    <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Принимает личный состав</a>
                        <a class="dropdown-item" href="#">Никого не пускать!</a>
                    </div>
                </div>
                <!--<div class="col d-flex justify-content-end"> -->
                    <div class="btn-group d-flex mt-2">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Статус
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">В здании службы ЗГТ</a>
                            <a class="dropdown-item" href="#">На территории штаба</a>
                            <a class="dropdown-item" href="#">За пределами штаба</a>
                            <a class="dropdown-item" href="#">Отпуск</a>
                            <a class="dropdown-item" href="#">Командировка</a>
                            <a class="dropdown-item" href="#">Больничный</a>
                            <div class="dropdown-divider"></div>
                            <form class="px-4 py-3">
                                <div class="form-group">
                                    <label for="exampleDropdownFormStatus">Установить статус</label>
                                    <input type="text" class="form-control" id="exampleDropdownFormStatus" placeholder="местоположение">
                                </div>
                                <button type="submit" class="btn btn-primary">Установить</button>
                            </form>
                        </div>
                    </div>
                <!-- </div> -->
                <div class="btn-group d-flex mt-2">
                    <button type="button" class="btn btn-success">История перемещений</button>
                </div>

            </div>
            <div class="card-footer text-muted py-0">
                    Рабочие телефоны:
                    <p class="my-0 text-right"> АТС-Ц: 9-39-54 </p>
                    <p class="my-0 text-right"> АТС-Р: 11-600-2270 </p>
            </div>
        </div>
    </div>
    @endforeach
    <!-- <div class="col p-1">
        <div class="card">
        <img src="{{ asset('storage/images/noPhoto.jpg') }}" class="card-img-top" alt="no photo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>

    <div class="col p-1">
        <div class="card">
        <img src="{{ asset('storage/images/noPhoto.jpg') }}" class="card-img-top" alt="no photo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col p-1">
        <div class="card">
        <img src="{{ asset('storage/images/noPhoto.jpg') }}" class="card-img-top" alt="no photo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col p-1">
        <div class="card">
        <img src="{{ asset('storage/images/noPhoto.jpg') }}" class="card-img-top" alt="no photo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
    <div class="col p-1">
        <div class="card">
        <img src="{{ asset('storage/images/noPhoto.jpg') }}" class="card-img-top" alt="no photo">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div> -->

@endsection
