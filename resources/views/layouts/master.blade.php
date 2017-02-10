<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>
	<meta charset="utf-8">
  @include('partials.styles')
</head>
<body>
@include('partials.header')



<!-- Contenido aquí -->

@include('partials.mensajes')

@yield('content')

<!-- Contenido aquí -->




@include('partials.footer')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="{{ URL::asset('js/jquery.cookie.js') }}"></script>
<script src="{{ URL::asset('js/waypoints.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.counterup.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.parallax-1.1.3.js') }}"></script>
<script src="{{ URL::asset('js/front.js') }}"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{  URL::asset('js/checkout.js') }}"></script>

<!-- owl carousel -->
<script src="{{ URL::asset('js/owl.carousel.min.js') }}"></script>
</body>
</html>
