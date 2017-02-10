@extends('layouts.master')

@section('title')
    Laravel- E-commerce
@endsection

@section('content')

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
                          <li>Productos</li>
                      </ul>

                  </div>
              </div>
          </div>
  </div>

<div class="container">
<div class="container-fluid">



  <div class="col-md-12 clearfix" id="basket">
    <div class="box">

      @if($productos)
        <form method="post" action="#">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th colspan="2">Producto</th>
                            <th>Nombre</th>
                            <th>Categoría</th>
                            <th>Cantidad</th>
                            <th>Precio unidad</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                  <!-- PRODUCTOOOOOO AQUÍIIIIII     -->

                  @foreach($productos as $product)
                        <tr>
                            <td>
                                <a href="#">
                                    <img src="{{ URL::asset($product->imgpath) }}" alt="Fotografía del producto">
                                </a>
                            </td>
                            <td></td>
                            <td>{{$product->nombre}}</td>
                            <td>{{$product->categoria}}</td>
                            <td>{{ $product->cantidad }}</td>
                            <td>${{ $product->precio }}</td>
                            <td><a href="{{route('admin.editar', ['id' => $product->id ]) }}"><i class="fa fa-folder-open"></i></a></td>
                            <td><a href="{{ route('admin.eliminar', ['id' => $product->id ]) }}"><i class="fa fa-trash-o"></i></a>
                            </td>
                        </tr>
                  @endforeach

                 <!-- PRODUCTO TERMINA AQUÍIIII   -->
                    </tbody>
                </table>

            </div>
            <!-- /.table-responsive -->

            <div class="box-footer">
                <div class="pull-left">
                    <a href="{{ route('admin.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Volver al panel</a>
                </div>
            </div>
        </form>
        @else

        <div id="heading-breadcrumbs">
                  <div class="container">
                      <div class="row">
                          <div class="col-md-7">
                              <h1>No existen productos en la base de datos.</h1>
                          </div>
                      </div>
                  </div>
          </div>

        @endif
    </div>
  </div>
</div>
</div>




@endsection
