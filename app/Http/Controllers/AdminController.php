<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Categorias;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use Illuminate\Support\Facades\Storage;
use File;

class AdminController extends Controller
{

//------------------------------------------------------------------------------

    public function index()
    {
        $categorias= Categorias::get();
        return view('admin.administrar', ['categorias' => $categorias]);
    }

//------------------------------------------------------------------------------


    public function create()
    {
      $categorias= Categorias::get();
      return view('admin.admin', ['categorias' => $categorias]);
    }

//------------------------------------------------------------------------------

    public function store(ProductCreateRequest $request)
    {
      $producto= new Productos();
      $producto->nombre= $request->nombre;
      $producto->descripcion= $request->descripcion;
      $producto->nombre= $request->nombre;
      $producto->precio= $request->precio;
      $producto->categoria= $request->categoria;
      $producto->cantidad= $request->cantidad;

      $img = $request->file('imgpath');
      $img_nombre= time().'_'.$img->getClientOriginalName();

      Storage::disk('imgpath')->put($img_nombre, file_get_contents($img->getRealPath()) );

      $producto->imgpath= 'img/'.$img_nombre;


      if($producto->save()){
        return back()->with('msj', 'Datos guardados satisfactoriamente');
      }
      else {
        return back()->with('msj2', 'El producto no pudo ser procesado!, vuelva a intentarlo.');
      }
    }

//------------------------------------------------------------------------------

    public function show()
    {
      $productos= Productos::
      select('productos.id','productos.nombre', 'productos.descripcion', 'productos.imgpath', 'productos.precio', 'categorias.categoria', 'productos.cantidad' )
      ->join('categorias', 'categorias.id','=', 'productos.categoria')->get();

      return view('admin.productos-admin', ['productos' => $productos]);

    }

//------------------------------------------------------------------------------

    public function editarProducto($id)
    {
        $producto= Productos::find($id);
        $categorias= Categorias::get();

        if($producto==null){
          return redirect()->route('admin.modificar');
        }

        return view('admin.editar-producto', ['producto'=> $producto, 'categorias'=>$categorias]);
    }


//------------------------------------------------------------------------------

    public function editarPOST(ProductUpdateRequest $request ,$id){

      $producto= Productos::find($id);

      if($producto== null){
        return route('admin.modificar');
      }

      $producto->nombre = $request->nombre;
      $producto->descripcion = $request->descripcion;
      $producto->precio = $request->precio;
      $producto->categoria = $request->categoria;
      $producto->cantidad = $request->cantidad;

      if($producto->save()){
        return redirect()->route('admin.modificar')->with('msj', 'Datos del producto modificados satisfactoriamente');
      }
      else {
        return redirect()->route('admin.modificar')->with('msj2', 'El producto no pudo ser procesado!, vuelva a intentarlo.');
      }

//------------------------------------------------------------------------------

    }



//------------------------------------------------------------------------------

    public function eliminarProducto($id){

      $producto= Productos::findOrFail($id);

      $imgpath= public_path().'/'.$producto->imgpath;

      if( $producto->delete()  &&  \File::Delete($imgpath) ){

        // ELIMINAR LA FOTO DEL STORAGE AQUÍ

        return redirect()->route('admin.modificar')->with('msj', 'El producto se ha eliminado de la lista');
      }
      else {
        return back()->with('msj2', 'El producto no pudo ser procesado!, vuelva a intentarlo.');
      }

    }

//------------------------------------------------------------------------------

}// FIN DE LA CLASE
