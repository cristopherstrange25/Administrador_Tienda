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
    public function crear(){
            // Recuperar proveedores y categorías desde la base de datos
            $proveedores = DB::table('suppliers')->get(); // O puede usar el modelo Supplier::all() si lo prefieres
            $categorias = DB::table('categories')->where('status', 'ACTIVO')->get();  // O puede usar el modelo Category::all() si lo prefieres
        
            // Pasar los datos a la vista
            return view('admin.productos.create', compact('proveedores', 'categorias'));
    }
    public function guardar(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
        'supplier_id' => 'required|integer',
        'categorie_id' => 'required|integer',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'status' => 'required|string|max:255',
        'picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'photos.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    // Guardar la imagen principal
    $image1 = $request->file('picture')->store('public/images');
    $image2 = $image1; // Guardar la misma imagen en image2

    // Guardar las imágenes adicionales
    $photos = [];
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $photos[] = $photo->store('public/images');
        }
    }

    // Insertar el producto en la base de datos
    DB::table('products')->insert([
        'name' => $request->name,
        'supplier_id' => $request->supplier_id,
        'categorie_id' => $request->categorie_id,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'status' => $request->status,
        'image1' => $image1,
        'image2' => $image2,
    ]);

    // Recuperar productos activos y redirigir a la vista de lista
    $products = DB::table('products')->where('status', 'ACTIVO')->get();
    return view('/admin/productos/list')->with('productos', $products);
}
    
    public function editar($id) { // Vista
        $proveedores = DB::table('suppliers')->get();
        $producto = DB::table('products')->where('id', $id)->first();
        $categorias = DB::table('categories')->where('status', 'ACTIVO')->get(); // Obtén las categorías activas
        return view('admin.productos.edit')->with('producto', $producto)->with('proveedores', $proveedores)->with('categorias', $categorias); // Cambié 'categoria' a 'categories'
    }
    
    
    public function actualizar(Request $request, $id)
{
    // Validar la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
        'supplier_id' => 'required|integer',
        'categorie_id' => 'required|integer',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'status' => 'required|string|max:255',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Hacerlo opcional
        'photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Hacerlo opcional
    ]);

    // Buscar el producto en la base de datos
    $producto = DB::table('products')->where('id', $id)->first();

    // Si se sube una nueva imagen principal (picture), guardarla
    if ($request->hasFile('picture')) {
        $image1 = $request->file('picture')->store('public/images');
        $image2 = $image1; // Guardar la misma imagen en image2
    } else {
        // Si no hay nueva imagen, mantener las imágenes actuales
        $image1 = $producto->image1;
        $image2 = $producto->image2;
    }

    // Guardar las imágenes adicionales (si las hay)
    $photos = [];
    if ($request->hasFile('photos')) {
        foreach ($request->file('photos') as $photo) {
            $photos[] = $photo->store('public/images');
        }
    }

    // Actualizar los datos del producto en la base de datos
    DB::table('products')->where('id', $id)
        ->update([
            'name' => $request->name,
            'supplier_id' => $request->supplier_id,
            'categorie_id' => $request->categorie_id,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'status' => $request->status,
            'image1' => $image1, // Actualizar la imagen en image1
            'image2' => $image2, // Actualizar la misma imagen en image2
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
