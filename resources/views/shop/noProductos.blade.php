@extends('layouts.master')

@section('title')
    Laravel- E-commerce
@endsection

@section('content')
<br>
<br>

  @if(Session::has('success'))
  <section class="bar no-mb color-white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h1>Perfecto!</h1>

                        <p class="lead">{{ Session::get('success') }}</p>

                    </div>
                </div>
            </div>
  </section>
  @endif

  <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>No existen productos de esa categoría por el momento.</h1>
                    </div>
                </div>
            </div>
    </div>

<div class="container">
    <div class="box-footer">
        <div class="pull-left">
            <a href="{{ route('product.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Volver al inicio</a>
        </div>
    </div>
</div>
<br><br>


<div class="container">
        <p class="text-muted lead text-center">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>


</div> <!--Fin container-->

@endsection
