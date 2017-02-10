
<header>

            <!-- *** TOP ***
_________________________________________________________ -->
            <div id="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-5 contact">
                            <p class="hidden-sm hidden-xs">Contáctanos al +420 777 555 333 o por hello@universal.com.</p>
                            <p class="hidden-md hidden-lg"><a href="#" data-animate-hover="pulse"><i class="fa fa-phone"></i></a>  <a href="#" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </p>
                        </div>
                        <div class="col-xs-7">
                            <div class="social">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i></a>
                                <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="email" data-animate-hover="pulse"><i class="fa fa-envelope"></i></a>
                            </div>

                            @if (Auth::guest())
                            <div class="login">
                                <a href="{{ url('/login') }}" data-toggle="modal" data-target="#login-modal"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Entrar</span></a>
                                <a href="{{ url('/registrarse') }}"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase">Registrarse</span></a>
                            </div>
                            @else
                                <!-- Left Side Of Navbar -->
                                <div class="login">
                                  @if(Auth::user()->email == "admin@admin.com")
                                    <a href="{{ URL('/admin') }}" data-toggle="modal"><span class="hidden-xs">Administrar</span></a>
                                  @endif
              													<a href="{{ url('/user/profile') }}" data-toggle="modal"><i class="fa fa-user"></i> <span class="hidden-xs">{{ Auth::user()->nombre }}</span></a>
                                        <a href="{{ route('product.carrito-compra') }}" data-toggle="modal"><i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="hidden-xs">Carrito</span>
                                          <span class="badge">{{ Session::has('Carrito') ? Session::get('Carrito')->cantidad_total : '' }}</span>
                                        </a>

                                        <a href="{{ url('/logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Logout</span></a>
              																	<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
              																			{{ csrf_field() }}
              																	</form>


                                </div>
									          @endif


                    </div>
                </div>
            </div>
          </div>

            <!-- *** TOP END *** -->

            <!-- *** NAVBAR ***
    _________________________________________________________ -->

            <div class="navbar-affixed-top" data-spy="affix" data-offset-top="200">

                <div class="navbar navbar-default yamm" role="navigation" id="navbar">

                    <div class="container">
                        <div class="navbar-header">

                            <a class="navbar-brand home" href="index.html">
                                <img src="{{ URL::asset('img/logo.png') }}" alt="Universal logo" class="hidden-xs hidden-sm">
                                <img src="{{ URL::asset('img/logo-small.png') }}" alt="Universal logo" class="visible-xs visible-sm"><span class="sr-only">Tienda - go to homepage</span>
                            </a>
                            <div class="navbar-buttons">
                                <button type="button" class="navbar-toggle btn-template-main" data-toggle="collapse" data-target="#navigation">
                                    <span class="sr-only">Toggle navigation</span>
                                    <i class="fa fa-align-justify"></i>
                                </button>
                            </div>
                        </div>
                        <!--/.navbar-header -->

                        <div class="navbar-collapse collapse" id="navigation">

                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown active">
                                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Home <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="{{ Route('product.index') }}">Inicio</a>
                                        </li>
                                    </ul>
                                </li>

                                <!-- ========== FULL WIDTH MEGAMENU TIENDA ================== -->
                                <li class="dropdown use-yamm yamm-fw">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="200">Categorías <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <div class="yamm-content">
                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <h5>Ropa de Mujer</h5>
                                                        <ul>
                                                            <li><a href="{{ route('product.categoria', ['categoria' => 'blusas' ]) }}">Blusas</a>
                                                            </li>
                                                            <li><a href="{{ route('product.categoria', ['categoria' => 'vestidos' ]) }}">Vestidos</a>
                                                            </li>
                                                            <li><a href="{{ route('product.categoria', ['categoria' => 'chaquetas' ]) }}">Chaquetas</a>
                                                            </li>
                                                        </ul>
                                                        <h5>Ropa de hombre</h5>
                                                        <ul>
                                                            <li><a href="{{ route('product.categoria', ['categoria' => 'camisas.hombre' ]) }}">Camisas</a>
                                                            </li>
                                                            <li><a href="{{ route('product.categoria', ['categoria' => 'pantalones.hombre' ]) }}">Pantalones</a>
                                                            </li>
                                                            <li><a href="{{ route('product.categoria', ['categoria' => 'corbatas.hombre' ]) }}">Corbatas</a>
                                                            </li>
                                                        </ul>
                                                        <h5>Otros</h5>
                                                        <ul>
                                                            <li><a href="#">Otros</a>
                                                            </li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- /.yamm-content -->
                                        </li>
                                    </ul>
                                </li>
                                <!-- ========== FULL WIDTH MEGAMENU END ================== -->

                                <li class="dropdown">
                                    <a href="javascript: void(0)" class="dropdown-toggle" data-toggle="dropdown">Contáctanos <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="contact.html">Contacto</a>
                                        </li>

                                    </ul>
                                </li>
                            </ul>

                        </div>
                        <!--/.nav-collapse -->



                        <div class="collapse clearfix" id="search">

                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                    <span class="input-group-btn">

                    <button type="submit" class="btn btn-template-main"><i class="fa fa-search"></i></button>

                </span>
                                </div>
                            </form>

                        </div>
                        <!--/.nav-collapse -->

                    </div>


                </div>
                <!-- /#navbar -->

            </div>

            <!-- *** NAVBAR END *** -->


        </header>

        <!-- *** LOGIN MODAL ***
_________________________________________________________ -->

        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="Login" aria-hidden="true">
            <div class="modal-dialog modal-sm">

                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="Login">Login</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{ url('/login') }}" method="post">
                          {{ csrf_field() }}
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" id="email_modal" placeholder="email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password_modal" placeholder="password">
                            </div>

                            <p class="text-center">
                                <button class="btn btn-template-main"><i class="fa fa-sign-in"></i> Entrar</button>
                            </p>

                        </form>

                        <p class="text-center text-muted">No estás registrado aún?</p>
                        <p class="text-center text-muted"><a href="{{url('/registrarse')}}"><strong>Registrate ahora</strong></a>! Y podrás aprovechar todas nuestras ofertas!</p>

                    </div>
                </div>
            </div>
        </div>

      <!-- *** LOGIN MODAL END *** -->
