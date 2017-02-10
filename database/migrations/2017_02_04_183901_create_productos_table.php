<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('productos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nombre');
          $table->text('descripcion');
          $table->string('imgpath');
          $table->integer('precio');
          $table->integer('categoria')->length(10)->unsigned();
          $table->timestamps();

          $table->foreign('categoria')->references('id')->on('categorias');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
