<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
      protected $table= 'ordens';

      protected $fillable = [
          'usuario_id', 'carrito', 'direccion', 'nombre', 'stripe_id'
      ];

      public function user() {
        return $this->belongsTo(User::class);
      }
}
