@extends('layouts.master')

@section('title')
    Laravel- E-commerce
@endsection

@section('content')
<br><br>
<div id="heading-breadcrumbs">
          <div class="container">
              <div class="row">
                  <div class="col-md-7">
                      <h1>Administrar productos</h1>
                  </div>
                  <div class="col-md-5">
                      <ul class="breadcrumb">
                          <li><a href="{{ route('product.index') }}">Inicio</a>
                          </li>
                          <li>Agregar productos</li>
                      </ul>

                  </div>
              </div>
          </div>
  </div>
<br>

<div class="container">
  <div class="box-footer">
      <div class="pull-left">
          <a href="{{ route('admin.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Volver al panel</a>
      </div>
  </div>
</div>

<div class="container">
  <br>

  <form class="form-horizontal" action="{{ url('admin/agregar') }}" method="POST" accept-charset="UTF-8" enctype="multipart/form-data">
          {{ csrf_field() }}
      <fieldset>
        <legend>Nuevo producto</legend>

        <div class="form-group">
          <label for="inputnombre" class="col-lg-2 control-label">Nombre</label>
          <div class="col-lg-8">
            @if ($errors->has('nombre'))
              <span style="color: red;">{{ $errors->first('nombre') }}</span>
            @endif
            <input type="text" class="form-control" name="nombre" id="inputnombre" placeholder="Nombre">
          </div>
        </div>

        <div class="form-group">
          <label for="inputnombre" class="col-lg-2 control-label">Descripción</label>
          <div class="col-lg-8">
            @if ($errors->has('descripcion'))
              <span style="color: red;">{{ $errors->first('descripcion') }}</span>
            @endif
            <textarea class="form-control" name="descripcion" rows="3"></textarea>
          </div>
        </div>

        <div class="form-group">
          <label for="imgpath">Fotografía</label>
          <input type="file" id="imgpath" name="imgpath">
          <p class="help-block">Agregue una fotografía del producto.</p>
        </div>

        <div class="form-group">
          <label for="inputprecio" class="col-lg-2 control-label">Precio</label>
          <div class="col-lg-8">
            @if ($errors->has('precio'))
              <span style="color: red;">{{ $errors->first('precio') }}</span>
            @endif
            <input type="text" class="form-control" name="precio" id="inputprecio" placeholder="Precio">
          </div>
        </div>

        <div class="form-group">
          <label for="select" class="col-lg-2 control-label">Seleccione la categoría</label>
          <div class="col-lg-8">
            <select class="form-control" id="select" name="categoria">
              @foreach ($categorias as $c)
              <option value="{{ $c->id }}">{{$c->categoria}}</option>
              @endforeach
            </select>
            @if ($errors->has('categoria'))
              <span style="color: red;">{{ $errors->first('categoria') }}</span>
            @endif
          </div>
        </div>

        <div class="form-group">
          <label for="inputnombre" class="col-lg-2 control-label">Cantidad</label>
          <div class="col-lg-8">
            @if ($errors->has('cantidad'))
              <span style="color: red;">{{ $errors->first('cantidad') }}</span>
            @endif
            <input type="text" class="form-control" name="cantidad" id="inputcantidad" placeholder="Cantidad">
          </div>
        </div>


        <div class="form-group">
          <div class="col-lg-8 col-lg-offset-2">
            <button type="reset" class="btn btn-default">Borrar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </div>
      </fieldset>
    </form>

    <br>


</div>

<br>
@endsection
