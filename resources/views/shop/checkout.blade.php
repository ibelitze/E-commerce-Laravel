@extends('layouts.master')

@section('title')
    Laravel- E-commerce
@endsection

@section('content')

<br><br>
<div class="container">
  <div class="row">
        <div class="col-md-9 clearfix" id="checkout">

                        <div class="box">
                            <form method="POST" action="{{ route('checkout') }}" id="payment-form">

                              <!-- Aquí ponemos un alert-danger, que se mostrará solo cuando haya un error -->
                              <div id="charge-error" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                                  {{ Session::get('error') }}
                              </div>

                                <ul class="nav nav-pills nav-justified">
                                    <li class="active"><a href="#"><i class="fa fa-map-marker"></i><br>Datos para la compra</a>
                                    </li>
                                </ul>

                                <span class="payment-errors">
                                </span>

                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="firstname">Nombre completo</label>
                                                <input type="text" name="nombre" class="form-control" id="firstname" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="street">Direccion</label>
                                                <input type="text" name="direccion" class="form-control" id="street" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.row -->

                                    <div class="row">
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="city">Ciudad</label>
                                                <input type="text" class="form-control" id="city" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="zip">ZIP</label>
                                                <input type="text" class="form-control" id="zip" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="phone">Teléfono</label>
                                                <input type="text" class="form-control" id="phone" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" id="email" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="card_number">Número de tarjeta de crédito</label>
                                                <input type="text" class="form-control" id="card_number" data-stripe="number" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="expiry_month">Mes de expiración</label>
                                                <input type="text" class="form-control" id="expiry_month" data-stripe="exp_month" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="expiry_year">Año de expiración</label>
                                                <input type="text" class="form-control" id="expiry_year" data-stripe="exp_year" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-3">
                                            <div class="form-group">
                                                <label for="cvc">CVC</label>
                                                <input type="text" class="form-control" id="cvc" data-stripe="cvc" required>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /.row -->
                                </div>

                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('product.carrito-compra') }}" class="btn btn-default"><i class="fa fa-chevron-left"></i>Regresar al carrito</a>
                                    </div>
                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-template-main" id="submit" value="Comprar ahora">

                                    </div>
                                </div>
                                {{ csrf_field() }}
                            </form>
                        </div>
                        <!-- /.box -->
        </div>

                    <!-- CUADRO DE SUBTOTAL VA AQUÍ -->
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
      </div>

  </div>


</div>




@endsection

<script type="text/javascript" src="{{  URL::asset('js/checkout.js') }}"></script>
