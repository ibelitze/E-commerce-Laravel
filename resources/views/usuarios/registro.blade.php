@extends('layouts.master')

@section('title')
    Registrarse - Entrar
@endsection

@section('content')

        <div id="heading-breadcrumbs">
            <div class="container">
                <div class="row">
                    <div class="col-md-7">
                        <h1>Nueva cuenta / Registrarse</h1>
                    </div>
                    <div class="col-md-5">
                        <ul class="breadcrumb">
                            <li><a href="/">Home</a>
                            </li>
                            <li>Nueva cuenta / Entrar</li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>

        @if(count($errors) > 0 )
        <div class="alert alert-danger">
          @foreach($errors->all() as $error)
            <p>{{ $error }}</p>
          @endforeach
        </div>
        @endif

        <div id="content">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">Nueva cuenta</h2>

                            <p class="lead">No tienes cuenta todavía?</p>
                            <p>Entra al mundo de la moda y la actualidad con nuestros productos!</p>
                            <p class="text-muted">Si tienes preguntas contáctanos <a href="contact.html">contact us</a>, nuestro servicio de atención al cliente trabaja 24/7.</p>

                            <hr>

                            <form action="{{ url('/register') }}" method="POST" role="form">
                              {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="name-login">Nombre</label>
                                    @if($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                    @endif
                                    <input type="text" name="nombre" class="form-control" id="name-login" required>
                                </div>
                                <div class="form-group">
                                    <label for="email-login">Email</label>
                                    @if($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                    @endif
                                    <input type="text" name="email" class="form-control" id="email-login" required>
                                </div>
                                <div class="form-group">
                                    <label for="password-login">Contraseña</label>
                                    @if($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif
                                    <input type="password" name="password" class="form-control" id="password-login">
                                </div>
                                <div class="form-group">
                                    <label for="password-login">Confirme la contraseña</label>
                                    @if($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                    @endif
                                    <input type="password" class="form-control" name="password_confirmation" class="form-control" id="password-confirm">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-user-md"></i> Registrarse</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="box">
                            <h2 class="text-uppercase">Entrar</h2>

                            <p class="lead">Ya tienes tu cuenta?</p>
                            <p class="text-muted">Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean
                                ultricies mi vitae est. Mauris placerat eleifend leo.</p>

                            <hr>

                            <form action="customer-orders.html" method="post">
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" class="form-control" id="email">
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-template-main"><i class="fa fa-sign-in"></i> Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.row -->

            </div>
            <!-- /.container -->
        </div>
        <!-- /#content -->

@endsection
