<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CategoryController extends Controller
{
    //CRUD Create Read Update Delete
    public function indice(){//vista
        $categories = DB::table('categories')->where('status','ACTIVO')->get();
        return view('/admin/categorias/list')->with('categorias', $categories);
    }
    public function crear(){//Vista
        return view('admin/categorias/create');
    }
    public function guardar(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
    ]);

    // Subir la imagen si se proporciona
    $picturePath = null; // Iniciar variable para la ruta de la imagen
    if ($request->hasFile('picture')) {
        $picturePath = $request->file('picture')->store('public/images'); // Almacenar la imagen
    }

    // Insertar la nueva categoría en la base de datos
    DB::table('categories')->insert([
        'name' => $request->name,
        'description' => $request->description,
        'picture' => $picturePath, // Guardar la ruta de la imagen
        'status' => 'ACTIVO',
    ]);

    // Recuperar todas las categorías activas y redirigir a la vista
    $categories = DB::table('categories')->where('status', 'ACTIVO')->get();
    return view('/admin/categorias/list')->with('categorias', $categories);
}

    public function editar($id){//Vista
        $categoria = DB::table('categories')->where('id',$id)->first();
        return view('admin/categorias/edit')->with('categoria', $categoria);
    }
    public function actualizar(Request $request, $id)
{
    // Validar la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
    ]);

    // Buscar la categoría para ver si tiene una imagen existente
    $category = DB::table('categories')->where('id', $id)->first();
    $picturePath = $category->picture; // Ruta de la imagen existente

    // Si se sube una nueva imagen, reemplazar la ruta
    if ($request->hasFile('picture')) {
        // Eliminar la imagen anterior (si es necesario)
        if ($picturePath && file_exists(storage_path('app/' . $picturePath))) {
            unlink(storage_path('app/' . $picturePath));
        }
        // Subir la nueva imagen
        $picturePath = $request->file('picture')->store('public/images');
    }

    // Actualizar la categoría en la base de datos
    DB::table('categories')->where('id', $id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'picture' => $picturePath, // Guardar la nueva ruta de la imagen
        ]);

    // Recuperar todas las categorías activas y redirigir a la vista
    $categories = DB::table('categories')->where('status', 'ACTIVO')->get();
    return view('/admin/categorias/list')->with('categorias', $categories);
}

    public function mostrar($id){//Vista 
        $categoria = DB::table('categories')->where('id',$id)->first();
        return view('admin/categorias/show')->with('categoria', $categoria);
    }
    public function borrar($id){//Proceso
        //$deleted = DB::table('categories')->where('id', $id )->delete();
        DB::table('categories')->where('id',$id)
        ->update([
            'status' => "INACTIVO",
        ]);
        $categories = DB::table('categories')->where('status','ACTIVO')->get();
        return view('/admin/categorias/list')->with('categorias', $categories);
    }
}
