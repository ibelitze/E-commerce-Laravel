@extends('layouts.master')

@section('title')
    Laravel- E-commerce
@endsection

@section('content')

  @if (Session::has('Carrito'))
      <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <p class="text-muted lead">Actualmente tienes {{ $cantidad_total }} productos en tu carrito de compra.</p>
                    </div>

                    <div class="col-md-9 clearfix" id="basket">
                        <div class="box">

                            <form method="post" action="#">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Producto</th>
                                                <th>Cantidad</th>
                                                <th>Precio unidad</th>
                                                <th>Descuento</th>
                                                <th colspan="2">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                      <!-- PRODUCTOOOOOO AQUÍIIIIII     -->

                                      @foreach($productos as $product)
                                            <tr>
                                                <td>
                                                    <a href="#">
                                                        <img src="{{ $product['items']['imgpath'] }}" alt="{{ $product['items']['imgpath'] }}">
                                                    </a>
                                                </td>
                                                <td></td>
                                                <td>{{ $product['cantidad'] }}</td>
                                                <td>${{ $product['items']['precio'] }}</td>
                                                <td>$0</td>
                                                <td>{{ $product['items']['precio'] }}</td>
                                                <td><a href="{{ route('product.eliminar', ['id' => $product['items']['id'] ]) }}"><i class="fa fa-trash-o"></i></a>
                                                </td>
                                            </tr>
                                      @endforeach

                                     <!-- PRODUCTO TERMINA AQUÍIIII   -->
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="5">Total</th>
                                                <th colspan="2">${{$precio_total}}</th>
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div>
                                <!-- /.table-responsive -->

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('product.index') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i> Continue shopping</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('checkout') }}" class="btn btn-template-main">Proceed to checkout <i class="fa fa-chevron-right"></i></a>
                                    </div>
                                </div>

                            </form>

                        </div>
                        <!-- /.box -->

                        <div class="row">
                            <div class="col-md-3">
                                <div class="box text-uppercase">
                                    <h3>Tal vez te puedan gustar estos productos</h3>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="image">
                                        <a href="shop-detail.html">
                                            <img src="img/product2.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3><a href="shop-detail.html">Fur coat</a></h3>
                                        <p class="price">$143</p>

                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="image">
                                        <a href="shop-detail.html">
                                            <img src="img/product3.jpg" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3><a href="shop-detail.html">Fur coat</a></h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>

                            <div class="col-md-3">
                                <div class="product">
                                    <div class="image">
                                        <a href="shop-detail.html">
                                            <img src="{{ URL::asset('img/product1.jpg') }}" alt="" class="img-responsive image1">
                                        </a>
                                    </div>
                                    <div class="text">
                                        <h3><a href="shop-detail.html">Fur coat</a></h3>
                                        <p class="price">$143</p>
                                    </div>
                                </div>
                                <!-- /.product -->
                            </div>
                        </div>
                    </div>
                    <!-- /.col-md-9 -->

                    <div class="col-md-3">
                        <div class="box" id="order-summary">
                            <div class="box-header">
                                <h3>Resumen</h3>
                            </div>
                            <p class="text-muted">Envíos y tarifas serán calculados en base a los productos seleccionados.</p>

                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Subtotal</td>
                                            <th>${{$precio_total}}</th>
                                        </tr>
                                        <tr>
                                            <td>Traslado y manejo</td>
                                            <th>$10.00</th>
                                        </tr>
                                        <tr>
                                            <td>Tax</td>
                                            <th>$0.00</th>
                                        </tr>
                                        <tr class="total">
                                            <td>Total</td>
                                            <th>${{$precio_total + 10}}</th>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h4>Código cupón</h4>
                            </div>
                            <p class="text-muted">Si tienes un cupón puedes usarlo aquí.</p>
                            <form>
                                <div class="input-group">

                                    <input type="text" class="form-control">
                                    <span class="input-group-btn">
              <button class="btn btn-template-main" type="button"><i class="fa fa-gift"></i></button>

          </span>
                                </div>
                                <!-- /input-group -->
                            </form>
                        </div>

                    </div>
                    <!-- /.col-md-3 -->

                </div>

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->
  @else

  <div id="content">
        <div class="container">
          <br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-muted lead">Actualmente no tienes productos en tu carrito de compra.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="box text-uppercase">
                        <h3>Tal vez te puedan gustar estos productos</h3>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="product">
                        <div class="image">
                            <a href="shop-detail.html">
                                <img src="{{ URL::asset('img/product2.jpg') }}" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <div class="text">
                            <h3><a href="shop-detail.html">Fur coat</a></h3>
                            <p class="price">$143</p>

                        </div>
                    </div>
                    <!-- /.product -->
                </div>

                <div class="col-md-3">
                    <div class="product">
                        <div class="image">
                            <a href="shop-detail.html">
                                <img src="{{ URL::asset('img/product3.jpg') }}" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <div class="text">
                            <h3><a href="shop-detail.html">Fur coat</a></h3>
                            <p class="price">$143</p>
                        </div>
                    </div>
                    <!-- /.product -->
                </div>

                <div class="col-md-3">
                    <div class="product">
                        <div class="image">
                            <a href="shop-detail.html">
                                <img src="{{ URL::asset('img/product1.jpg') }}" alt="" class="img-responsive image1">
                            </a>
                        </div>
                        <div class="text">
                            <h3><a href="shop-detail.html">Fur coat</a></h3>
                            <p class="price">$143</p>
                        </div>
                    </div>
                    <!-- /.product -->
                </div>
            </div>
        </div>
        <!-- /.col-md-9 -->
        </div>
  </div>


  @endif



@endsection
