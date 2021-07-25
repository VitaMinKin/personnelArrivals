@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col">

    <div class="jumbotron">
      
      <a href="/setSignal/100" class="display-2 
        p-5 m-0 
        text-decoration-none 
        text-monospace 
        font-weight-bold 
        d-flex justify-content-center  
        bg-info
        text-dark">
          <p class="mt-1 mb-0 p-0">ПОСТОЯННАЯ</p>
      </a>

      <a href="/setSignal/101" class="display-2 
        p-5 m-0 
        text-decoration-none 
        text-monospace 
        font-weight-bold 
        d-flex justify-content-center
        bg-success  
        text-white">
          <p class="mt-1 mb-0 p-0">ПОВЫШЕННАЯ</p>
      </a>

      <a href="/setSignal/102" class="display-2 
        p-5 m-0 
        text-decoration-none 
        text-monospace 
        font-weight-bold 
        d-flex justify-content-center
        bg-warning  
        text-white">
          <p class="mt-1 mb-0 p-0">ВОЕННАЯ ОПАСНОСТЬ</p>
      </a>

      <a href="/setSignal/103" class="display-1 
        p-5 m-0 
        text-decoration-none 
        text-monospace 
        font-weight-bold 
        d-flex justify-content-center
        bg-danger text-white">
          <p class="mt-1 mb-0 p-0">ПОЛНАЯ</p>
      </a>
      
      
    </div>

  </div>

</div>

@endsection
