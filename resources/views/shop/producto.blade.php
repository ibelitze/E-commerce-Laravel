@extends('layouts.master')

@section('title')
    Laravel- E-commerce
@endsection

@section('content')
<br>
<br>

<div class="container">
  <div class="row">
    <div class="box-footer">
        <div class="pull-left">
            <a href="{{ route('product.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Volver al inicio</a>
        </div>
    </div>
  </div>
</div>
<br><br>

<div class="container">

                    <div class="col-md-10">

                      <div class="heading">
                        <h1>{{$producto->nombre}}</h1>
                      </div>

                        <p class="lead"> {{$producto->descripcion}} </p>
                        <p class="goToDescription"><a href="#details" class="scroll-to text-uppercase">Ver detalles del producto</a>
                        </p>


                        <div class="row" id="productMain">
                            <div class="col-sm-6">
                                <div id="mainImage">
                                    <img src="{{ URL::asset($producto->imgpath) }}" alt="producto" class="img-responsive">
                                </div>

                                <!-- <div class="ribbon sale">
                                    <div class="theribbon">DISPONIBLE</div>
                                    <div class="ribbon-background"></div>
                                </div>


                                <div class="ribbon new">
                                    <div class="theribbon">NUEVO</div>
                                    <div class="ribbon-background"></div>
                                </div> -->

                            </div>
                            <div class="col-sm-6">
                                <div class="box">

                                    <form>
                                        <div class="sizes">

                                            <h3>Tallas disponibles</h3>

                                            <label for="size_s">
                                                <a href="#">S</a>
                                                <input type="radio" id="size_s" name="size" value="s" class="size-input">
                                            </label>
                                            <label for="size_m">
                                                <a href="#">M</a>
                                                <input type="radio" id="size_m" name="size" value="m" class="size-input">
                                            </label>
                                            <label for="size_l">
                                                <a href="#">L</a>
                                                <input type="radio" id="size_l" name="size" value="l" class="size-input">
                                            </label>

                                        </div>

                                        <p class="price">${{$producto->precio}}</p>

                                        <p class="text-center">
                                            <a href="route('product.carrito', ['id' => $product->id ])" class="btn btn-template-main"><i class="fa fa-shopping-cart"></i> Agregar a carrito</a>
                                            </button>
                                        </p>

                                    </form>
                                </div>

                                <div class="row" id="thumbs">
                                    <div class="col-xs-4">
                                            <img src="{{URL::asset('img/detailsquare.jpg')}}" alt="" class="img-responsive">

                                    </div>
                                    <div class="col-xs-4">
                                            <img src="{{URL::asset('img/detailsquare2.jpg')}}" alt="" class="img-responsive">

                                    </div>
                                    <div class="col-xs-4">
                                            <img src="{{URL::asset('img/detailsquare3.jpg')}}" alt="" class="img-responsive">

                                    </div>
                                </div>
                            </div>

                        </div>


                        <div class="box" id="details">
                            <p>
                                <h4>Detalles del producto</h4>
                                <p>{{$producto->descripcion}}</p>
                                <h4>Materiales & cuidados</h4>
                                <ul>
                                    <li>Polyester</li>
                                    <li>Machine wash</li>
                                </ul>
                                <h4>Sobre la talla</h4>
                                <ul>
                                    <li>Tallas únicas</li>
                                </ul>

                                <blockquote>
                                    <p><em>Define style this season with Armani's new range of trendy tops, crafted with intricate details. Create a chic statement look by teaming this lace number with skinny jeans and pumps.</em>
                                    </p>
                                </blockquote>
                        </div>

                        <div class="box social" id="product-social">
                            <h4>Si te gusta: compártelo!</h4>
                            <p>
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>



                    </div>

</div>
@endsection
