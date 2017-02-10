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
                          <li>Panel</li>
                      </ul>

                  </div>
              </div>
          </div>
  </div>
<br><br>
<div class="container">

                      <div class="heading">
                          <h2>Panel administrativo</h2>
                      </div>

                      <div class="row same-height-row">
                        <div class="container-fluid">
                            <div class="col-md-4">
                              <a href="{{ route('admin.modificar') }}">
                                <div class="box-simple box-white same-height">
                                    <div class="icon">
                                        <i class="fa fa-desktop"></i>
                                    </div>
                                    <h3>Modificar/Eliminar producto</h3>
                                    <p>Si usted desea modificar, eliminar o corregir algún error: haga click aquí.</p>
                                </div>
                              </a>
                            </div>


                              <div class="col-md-4">
                                <a href="{{ route('admin.agregar') }}">
                                  <div class="box-simple box-white same-height">
                                      <div class="icon">
                                          <i class="fa fa-folder-open"></i>
                                      </div>
                                      <h3>Agregar producto</h3>
                                      <p>Formulario para agregar un producto a la tienda. Haga click aquí.</p>
                                  </div>
                                </a>
                              </div>
                        </div>
                      </div>

</div>

<br>
@endsection
