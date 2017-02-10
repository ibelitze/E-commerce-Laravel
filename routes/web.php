<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

//-------------------------------------------------------------------------------

Auth::routes();  //Aquí se añaden automáticamente las rutas de autenticación de usuarios


//-------------------------------------------------------------------------------

//RUTAS PARA ADMIN

Route::group(['middleware' => 'Admin'], function () {

  Route::get('admin', [ // Ver el panel de administración de productos
    'uses' => 'AdminController@index',
    'as' => 'admin.index']);

  Route::get('admin/agregar', [ // Formulario de agregar un producto a la BD
    'uses' => 'AdminController@create',
    'as' => 'admin.agregar']);

  Route::post('admin/agregar', [ // Guardar los datos POST en la base de datos
    'uses' => 'AdminController@store',
    'as' => 'admin.agregar-producto']);

  Route::get('admin/modificar', [ // Panel de modificación-eliminación de productos (sus datos)
    'uses' => 'AdminController@show',
    'as' => 'admin.modificar']);

  Route::get('admin/eliminar/{id}', [ // Eliminar un producto de la base de datos
    'uses' => 'AdminController@eliminarProducto',
    'as' => 'admin.eliminar'])->where(['id' => '[0-9]+']);

  Route::get('admin/editar/{id}', [ // Editar todos los datos de un producto
    'uses' => 'AdminController@editarProducto',
    'as' => 'admin.editar'])->where(['id' => '[0-9]+']);

  Route::post('admin/editar/{id}', [ // Editar todos los datos de un producto
    'uses' => 'AdminController@editarPOST',
    'as' => 'admin.editarPOST'])->where(['id' => '[0-9]+']);

    });

//-------------------------------------------------------------------------------

// RUTAS PUBLICAS

    Route::get('/registrarse', [ // REGISTRARSE
      'uses' => 'UserController@Registrarse',
      'as' => 'user.index']);

    Route::get('/', [           // INDEX
      'uses' => 'ProductController@getIndex',
      'as' => 'product.index']);

    Route::get('/{categoria}',[ //mostrar productos por categorías
      'uses' => 'ProductController@Categorias',
      'as' => 'product.categoria'
      ])->where(['categoria' => '[A-Za-z]+']);



//-------------------------------------------------------------------------------


// USUARIOS LOGUEADOS

  Route::group([ 'middleware' => 'auth'], function(){

    Route::get('/user/profile', [ //ver el perfil del usuario logueado
      'uses' => 'UserController@getProfile',
      'as' => 'user.profile']);

    Route::get('/ver-producto/{id}', [ // Ver los detalles del producto
      'uses' => 'ProductController@producto',
      'as' => 'product.perfil'])->where(['id' => '[0-9]+']);

    Route::get('/agregar-a-carrito/{id}',[ //agregar producto al carrito de compra
      'uses' => 'ProductController@agregarCarrito',
      'as' => 'product.carrito'
    ])->where(['id' => '[0-9]+']);

    Route::get('/Carrito-productos', [ // Ver el carrito de compra
      'uses' => 'ProductController@carrito',
      'as' => 'product.carrito-compra']);

    Route::get('/checkout', [ //aquí está el formulario para concretar la compra
      'uses' => 'ProductController@checkout',
      'as' => 'checkout']);

    Route::post('/checkout', [  // aquí sale el formulario POST con los datos y la dirección de pago
      'uses' => 'ProductController@postCheckout',
      'as' => 'checkout']);

    Route::get('/eliminar-producto/{id}', [ // Eliminar productos del carrito
      'uses' => 'ProductController@eliminarCarrito',
      'as' => 'product.eliminar'])->where(['id' => '[0-9]+']);

  });

//------------------------------------------------------------------------------
