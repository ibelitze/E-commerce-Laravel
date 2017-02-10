yd@extends('layouts.master')

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

<div class="container">
        <p class="text-muted lead text-center">In our Ladies department we offer wide selection of the best products we have found and carefully selected worldwide. Pellentesque habitant morbi tristique senectus et netuss.</p>
    @foreach($producto->chunk(4) as $proChunk)

      <div class="row products">

          @foreach($proChunk as $product)

            <div class="col-md-3 col-sm-4">
                <div class="product">
                    <div class="image">
                        <a href="{{ route('product.perfil', ['id' => $product->id ]) }}">
                            <img src="{{$product->imgpath}}" alt="" class="img-responsive image1">
                        </a>
                    </div>
                    <!-- /.image -->
                    <div class="text">
                        <h3><a href="{{ route('product.perfil', ['id' => $product->id ]) }}">{{$product->descripcion}}</a></h3>
                        <p class="price">${{$product->precio}}</p>
                        <a href="{{ route('product.perfil', ['id' => $product->id ]) }}" class="btn btn-default">Ver más</a>
                        <a href="{{ route('product.carrito', ['id' => $product->id ]) }}" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i>Agregar a carrito</a>
                    </div>
                    <!-- /.text -->



                </div>
                <!-- /.product -->
              </div>
          @endforeach
            </div> <!-- Fin ROW-->
        @endforeach


    <div class="row">
          {!! $producto->render() !!}
    </div>

</div> <!--Fin container-->

@endsection
