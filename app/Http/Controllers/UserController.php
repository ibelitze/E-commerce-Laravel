<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function Registrarse(){
      return view('usuarios/registro');
    }

    //Por si hace falta un auth propio, o una validación propia
    //Se crea una ruta para que retorne acá el request desde el post de un formulario
    //ej:  route::post('/registrarse', 'uses' => UserController@Registro, 'as' => 'user.registro')

    //aquí abajo dejo el código de la autenticación propia (sin usar el auth que trae laravel)

    // public function Registro(Request $request){
    //   $this->validate($request, [
    //     'nombre' => 'required|max:255',
    //     'email' => 'required|email|max:255|unique:users',
    //     'password' => 'required|min:6',
    //   ]);
    //
    //   $user= new User([
    //     'email' => $request->input('email'),
    //     'password' => bcrypt($request->input('password')),
    //     'nombre' => $request->input('nombre')
    //   ]);
    //
    //   $user->save();
    //   return redirect()->route('product.index');
    // }

    //Para loguearse sería como acá abajo
    //hay que crear la ruta correspondiente
    //ej:  route::post('/entrar', 'uses' => UserController@Entrar, 'as' => 'user.login')

    // public function Entrar(Request $request){

    //   $this->validate($request, [
    //     'email' => 'required|email|max:255',
    //     'password' => 'required|min:6',
    //   ]);
    //
    //   if(Auth::attemp(['email' => $request->input('email'), 'password' => $request->input('password')])){
    //     return redirect()->route('product.index');
    //    }
    //     return redirect()->back();
    // }

    //para desloguear al usuario se usa la función de abajo
    //con su correspondiente ruta:
    //ej:  route::get('/user/logout', 'uses' => UserController@logOut, 'as' => 'user.logout')

    // public function logOut(){
    //   Auth::logout();
    // }

    public function getProfile(){

      $ordenes= Auth::user->ordenes;
      $ordenes->transform(function($order, $key){
        $order->carrito = unserialize($order->carrito);
        return $order;
      });

      return view('usuarios/profile', ['ordenes'=> $ordenes]);
    }

}
