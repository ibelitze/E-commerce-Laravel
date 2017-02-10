@extends('layouts.master')

@section('title')
    Perfil de usuario
@endsection

@section('content')

  <div id="heading-breadcrumbs">
      <div class="container">
          <div class="row">
              <div class="col-md-7">
                  <h1>Perfil de usuario</h1>
              </div>
              <div class="col-md-5">
                  <ul class="breadcrumb">
                      <li><a href="/">Home</a>
                      </li>
                      <li>Usuario</li>
                  </ul>

              </div>
          </div>
      </div>
  </div>

  <br><br>


  <div class="row">

    @foreach($ordenes as $orden)
    <div class="panel panel-default">
      <div class="panel-body">
        <ul class="list-group">
          @foreach($orden->carrito->items  as  $item)
          <li class="list-group-item">
            <span class="badge">{{ $item['precio'] }} $</span>
            {{ $item['nombre'] }} | {{ $item['cantidad']}} Unidades
          </li>
          @endforeach
        </ul>
      </div>
      <div class="panel-footer">
        <strong> Precio total: $ {{ $orden->carrito->precio_total }}</strong>
      </div>
  	</div>
    @endforeach


  </div>




@endsection
