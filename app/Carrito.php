<?php

namespace App;

class Carrito
{
    public $items= null;
    public $cantidad_total= 0;
    public $precio_total=0;


    public function __construct($oldcart){
      $this->items= $oldcart->items;
      $this->cantidad_total= $oldcart->cantidad_total;
      $this->precio_total= $oldcart->precio_total;
    }

    public function add($producto, $id){
      $storedItem= ['cantidad' => 0, 'precio' => $producto->precio, 'items' => $producto];
      if($this->items){
        if(array_key_exists($id, $this->items)){
          $storedItem= $this->items[$id];
        }
      }
      $storedItem['cantidad']++;
      $storedItem['precio']= $producto->precio * $storedItem['cantidad'];
      $this->items[$id]= $storedItem;
      $this->cantidad_total++;
      $this->precio_total += $producto->precio;


    }// FIN FUNCIÓN ADD

}// FIN DE LA CLASE
