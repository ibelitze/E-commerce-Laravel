<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
  protected $table= 'productos';

  protected $fillable = [
      'nombre', 'descripcion', 'imgpath', 'precio', 'categoria', 'cantidad'
  ];


  public function categorias(){

    return $this->hasMany(categorias::class);
  }

}
