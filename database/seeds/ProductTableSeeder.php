<?php

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $producto= new App\Product([
          'imgpath'=> 'http://lorempixel.com/output/fashion-q-c-240-200-4.jpg',
          'nombre' => 'ropa mujer',
          'descripcion' => 'Ropa de mujer casual, de verano e invierno',
          'precio' => 30
        ]);

        $producto->save();

        $producto= new App\Product([
          'imgpath'=> 'http://lorempixel.com/output/fashion-q-c-240-200-4.jpg',
          'nombre' => 'ropa hombre',
          'descripcion' => 'Ropa de hombre casual, de verano e invierno',
          'precio' => 40
        ]);

        $producto->save();

        $producto= new App\Product([
          'imgpath'=> 'http://lorempixel.com/output/fashion-q-c-240-200-4.jpg',
          'nombre' => 'ropa niño',
          'descripcion' => 'Ropa para niños y niñas',
          'precio' => 20
        ]);

        $producto->save();

        $producto= new App\Product([
          'imgpath'=> 'http://lorempixel.com/output/fashion-q-c-240-200-4.jpg',
          'nombre' => 'ropa adolescentes',
          'descripcion' => 'Ropa de adolescentes tanto para verano como para invierno',
          'precio' => 30
        ]);

        $producto->save();

        $producto= new App\Product([
          'imgpath'=> 'http://lorempixel.com/output/fashion-q-c-240-200-4.jpg',
          'nombre' => 'ropa jóvenes',
          'descripcion' => 'Ropa a la moda para los más jovenes',
          'precio' => 30
        ]);

        $producto->save();
    }
}
