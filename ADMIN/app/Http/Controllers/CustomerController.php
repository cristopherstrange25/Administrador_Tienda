<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function indice(){//Vista 
        $customers = DB :: table('customers')-> get();
        return view('admin/cliente/list')->with ('clientes',$customers);
    }
    public function crear(){//Vista
        return view ('admin/cliente/create');
    }
    public function guardar(Request $request)
{
    // Validación de los datos recibidos desde el formulario
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'email' => 'required|string|max:255',

    ]);

    // Insertar los datos validados en la tabla 'customers'
    DB::table('customers')->insert([
        'name' => $validatedData['name'],
        'address' => $validatedData['address'],
        'phone' => $validatedData['phone'],
        'email' => $validatedData['email'],
    ]);

    // Redirigir a la vista con todos los clientes después de guardar
    $clientes = DB::table('customers')->get();
    return view('admin/cliente/list')->with('clientes', $clientes);
}

    public function editar($id){//Vista
        $cliente = DB :: table('customers')->where('id', $id)->first();
        return view('admin/cliente/edit')->with('cliente', $cliente);
    }
    public function actualizar(Request $request, $id){//Proceso
        DB :: table('customers')->where('id',$id)
        -> update([
            'name' => $request -> name,
            'address' => $request -> address,
            'phone' => $request -> phone,
        ]);
        $clientes = DB :: table('customers')-> get();
        return view('admin/cliente/list')->with ('clientes',$clientes);
    }
    public function mostrar($id){//Vista
        $cliente = DB :: table('customers')->where('id', $id)->first(); 
        return view('admin/cliente/show')->with('cliente', $cliente);
    }
    public function borrar($id){//Proceso
        $deleted = DB::table('customers')->where('id', $id )->delete();
        $clientes = DB :: table('customers')-> get();
        return view('admin/cliente/list')->with ('clientes',$clientes);
    }
}
