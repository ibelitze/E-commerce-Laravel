<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorias extends Model
{

  protected $table= 'categorias';

  protected $fillable = [
      'categoria'
  ];

  public function Producto(){
    return $this->belongsTo(Productos::class);
  }

}
