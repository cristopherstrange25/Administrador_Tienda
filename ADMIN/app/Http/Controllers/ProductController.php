<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    //CRUD Create Read Update Delete
    public function indice() {
        $products = DB::table('products')
            ->where('status', 'ACTIVO')
            ->select('id', 'name', 'supplier_id', 'categorie_id', 'price', 'quantity', 'status', 'image1', 'image2') // Asegúrate de incluir estos campos
            ->get();
        return view('/admin/productos/list')->with('productos', $products);
    }
    public function crear(){//Vista
        return view('admin/productos/create');
    }
    public function guardar(Request $request){//Proceso
        

        DB::table('products')->insert([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'categorie_id' => $request->categorie_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'image1' => $request->picture, // Guardar la imagen en image1
            'image2' => $request->picture, // Guardar la misma imagen en image2
        ]);
    
        // Recuperar productos activos y redirigir a la vista de lista
        $products = DB::table('products')->where('status', 'ACTIVO')->get();
        return view('/admin/productos/list')->with('productos', $products);
    }
    
    public function editar($id) { // Vista
        $producto = DB::table('products')->where('id', $id)->first();
        $categorias = DB::table('categories')->where('status', 'ACTIVO')->get(); // Obtén las categorías activas
        return view('admin.productos.edit')->with('producto', $producto)->with('categories', $categorias); // Cambié 'categoria' a 'categories'
    }
    
    
    public function actualizar(Request $request, $id){//Proceso

        DB::table('products')->where('id', $id)
        ->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'categorie_id' => $request->categorie_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'image1' => $request->picture, // Actualizar la imagen en image1
            'image2' => $request->picture, // Actualizar la misma imagen en image2
        ]);
    
        // Recuperar productos activos y redirigir a la vista de lista
        $products = DB::table('products')->where('status', 'ACTIVO')->get();
        return view('/admin/productos/list')->with('productos', $products);
    }
    
    public function mostrar($id){//Vista 
        $producto = DB::table('products')->where('id',$id)->first();
        return view('admin/productos/show')->with('producto', $producto);
    }
    public function borrar($id){//Proceso
        DB::table('products')->where('id',$id)
        ->update([
            'status' => "INACTIVO",
        ]);
        $products = DB::table('products')->where('status','ACTIVO')->get();
        return view('/admin/productos/list')->with('productos', $products);
    }
}
