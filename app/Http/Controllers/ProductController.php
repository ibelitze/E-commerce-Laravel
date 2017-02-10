<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Productos;
use App\Carrito;
use App\Orden;
use App\Categorias;
use App\Oldcart;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{

//------------------------------------------------------------------------------

  //INDEX

    public function getIndex(){

      $producto= Productos::
      select('productos.id','productos.nombre', 'productos.descripcion', 'productos.imgpath', 'productos.precio', 'categorias.categoria' )
      ->join('categorias', 'categorias.id','=', 'productos.categoria')->paginate(8);

      return view('shop.index', ['producto' => $producto]);
    }

//------------------------------------------------------------------------------

  //AGREGAR A CARRITO

    public function agregarCarrito(Request $request, $id){
      $producto= Productos::find($id);
      $oldcart= Session::has('Carrito') ?  Session::get('Carrito') : null;

      // Si oldcart es null, quiere decir que session no tiene nada...
      // por ende, la creamos:
      if($oldcart === null){
        $oldcart= new oldcart();
      }

      $Carrito= new Carrito($oldcart);
      $Carrito->add($producto, $id);

      $request->session()->put('Carrito', $Carrito);
      return redirect()->route('product.index');
    }

    public function carrito(){

        if(!Session::has('Carrito')){ //si no hay nada en el carrito
          return view('shop.carrito');
        }
        $oldcart= Session::get('Carrito');
        $carrito= new Carrito($oldcart);
        return view('shop/carrito', ['productos' => $carrito->items,
        'precio_total' => $carrito->precio_total,
        'cantidad_total'=> $carrito->cantidad_total]);

    }

//------------------------------------------------------------------------------

  //ELIMINAR DEL CARRITO

    public function eliminarCarrito(Request $request, $id){

      $producto= Productos::find($id);
      $oldcart= Session::has('Carrito') ?  Session::get('Carrito') : null;

      //Si el carrito está vacío: no tiene ciencia que alguien intente borrar un producto...
      if($oldcart== null){
        return redirect()->route('product.index');  //redireccionamos.
      }

      //Buscamos el producto dentro del array de items
      if(array_key_exists($id, $oldcart->items)){
        if($oldcart->items[$id]['cantidad'] >= 2){
          $oldcart->items[$id]['cantidad']--;
        }
        else {
          $oldcart->items[$id]= null;
        }

      }

      //Eliminamos el producto del carrito, junto con su precio dentro del total
      $oldcart->precio_total= $oldcart->precio_total - $producto->precio;
      $oldcart->cantidad_total--;

      //Si el carrito se queda sin productos...
      if($oldcart->cantidad_total== 0 && $oldcart->precio_total==0){
        $oldcart==null;
        Session::forget('Carrito');
      }



      return redirect()->route('product.carrito-compra');
    }


//------------------------------------------------------------------------------

  //PAGAR LOS PRODUCTOS - FORMULARIO DE COMPRA

    public function checkout(){

      if(!Session::has('Carrito')){ //si no hay nada en el carrito
        return view('shop/carrito');
      }
        $oldcart= Session::get('Carrito');
        $carrito= new Carrito($oldcart);
        $total= $carrito->precio_total;
        return view('shop/checkout', ['productos' => $carrito->items,
        'precio_total' => $carrito->precio_total,
        'cantidad_total'=> $carrito->cantidad_total]);

    }

//------------------------------------------------------------------------------

  //PAGAR CON TARJETA DE CRÉDITO (STRIPE)

    public function postCheckout(Request $request){

      if(!Session::has('Carrito')){ //si no hay nada en el carrito
        return redirect()->route('product.carrito-compra');
      }
      $oldcart= Session::get('Carrito');
      $carrito= new Carrito($oldcart);

      Stripe::setApiKey("sk_test_gDTOZNw2Zv3owQt7ETl1MFzz");

      // Token is created using Stripe.js or Checkout!
      // Get the payment token submitted by the form:

      $token = $request->input('stripeToken');

        try{


          //Hasta los momentos no he podido comprobar que esta parte del código funciona 100%
          //he intentando hacer compras ficticias con Stripe y por alguna extraña razón mi pc
          //no conecta con stripe y no hace la compra.
          //Solo hay que chequear esto más adelante desde otro servidor no tan "local" como el mío
          //Y arreglar los detallitos que puedan salir. 
          $charge= Charge::create(array(
            "amount" => $carrito->precio_total + 10,
            "currency" => "usd",
            "description" => "ibelitze",
            "source" => $token,
          ));

          $order= new Orden();
          $order->carrito= serialize($carrito);
          $order->direccion= $request->input('direccion');
          $order->nombre= $request->input('nombre');
          $order->stripe_id= $charge->id;

          Auth::user->ordenes()->save($order);

        } catch(Exception $e){
          return redirect()->route('checkout')->with('error', $e->getMessage());
        }


        Session::forget('Carrito');
        return redirect()->route('product.index')->with('success', 'La compra se ha efectuado satisfactoriamente');


    }

//------------------------------------------------------------------------------

  //MOSTRAR LOS PRODUCTOS POR CATEGORÍAS

    public function Categorias($categoria){

      $array= Categorias::where('categoria', $categoria)->get();
      //como el resultado viene en un array, entonces lo simplifico abajo:
      //para que quede únicamente el valor dentro de la variable $id
      $id= $array[0]['id'];

      $producto= Productos::where('categoria', $id)->get();

      if( $producto->isEmpty() ){
        return view('shop.noProductos');
      }

      return view('shop.categoria', ['producto'=> $producto, 'categoria'=> $categoria]);
    }

//------------------------------------------------------------------------------

  public function producto($id){

    $producto= Productos::find($id);

    if($producto== null){
      return redirect()->route('product.index');
    }

    return view('shop.producto', ['producto'=> $producto]);

  }

//------------------------------------------------------------------------------

}// FIN DE LA CLASE
