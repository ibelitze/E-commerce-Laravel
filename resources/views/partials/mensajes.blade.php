@if (count($errors)>0)
  <div class="alert alert-danger" role="alert">
      <strong>Errores:</strong>
      <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
      </ul>
  </div>
@endif

@if (session()->has('update'))

  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Perfecto!</strong> {{session('msj')}}
  </div>

@endif

@if (session()->has('msj'))

  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Perfecto!</strong> {{session('msj')}}
  </div>

@endif

@if (session()->has('msj2'))

  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Lo sentimos!</strong> {{session('msj2')}}
  </div>

@endif

@if (session()->has('delete'))

  <div class="alert alert-dismissible alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Perfecto!</strong> {{session('delete')}}
  </div>

@endif
