<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    //CRUD Create Read Update Delete
    public function indice(){//vista
        $suppliers = DB::table('suppliers')->get();
        return view('/admin/proveedores/list')->with('proveedores', $suppliers);
    }
    public function crear(){//Vista
        return view('admin/proveedores/create');
    }
    public function guardar(Request $request)
{
    // Validar la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
        'contact_name' => 'required|string|max:255',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación de imagen
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'status' => 'required|string|max:255',
    ]);

    // Verificar si se ha subido un archivo de imagen
    $picture = $request->file('picture')->store('public/images');

    // Insertar el nuevo proveedor en la base de datos
    DB::table('suppliers')->insert([
        'name' => $request->name,
        'contact_name' => $request->contact_name,
        'picture' => $picture, // Guardar la imagen en la columna 'picture'
        'address' => $request->address,
        'phone' => $request->phone,
        'email' => $request->email,
        'status' => $request->status,
    ]);

    // Recuperar todos los proveedores y redirigir a la vista de lista
    $proveedores = DB::table('suppliers')->get();
    return view('/admin/proveedores/list')->with('proveedores', $proveedores);
}

    public function editar($id){//Vista
        $proveedor = DB::table('suppliers')->where('id', $id)->first();
        return view('admin/proveedores/edit')->with('proveedor', $proveedor);
    }
    public function actualizar(Request $request, $id)
{
    // Validar la solicitud
    $request->validate([
        'name' => 'required|string|max:255',
        'contact_name' => 'required|string|max:255',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Hacer la imagen opcional
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'status' => 'required|string|max:255',
    ]);

    // Buscar el proveedor en la base de datos
    $picture = $request->file('picture')->store('public/images');

    // Actualizar los datos del proveedor en la base de datos
    DB::table('suppliers')->where('id', $id)
        ->update([
            'name' => $request->name,
            'contact_name' => $request->contact_name,
            'picture' => $picture, // Actualizamos la imagen si se subió una nueva
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'status' => $request->status,
        ]);

    // Recuperar todos los proveedores y redirigir a la vista de lista
    $proveedores = DB::table('suppliers')->get();
    return view('/admin/proveedores/list')->with('proveedores', $proveedores);
}


    public function mostrar($id){//Vista
        $proveedor = DB::table('suppliers')->where('id', $id)->first();
        return view('admin/proveedores/show')->with('proveedor', $proveedor);
    }
    public function borrar($id){//Proceso
        $deleted = DB::table('suppliers')->where('id', $id )->delete();
        $proveedores = DB::table('suppliers')->get();
        return view('/admin/proveedores/list')->with('proveedores', $proveedores);
    }
}
