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
    public function guardar(Request $request){//Proceso
        //dd($request);
        DB::table('suppliers')->insert([
            'name' => $request -> name,
            'contact_name' => $request -> contact_name,
            'picture' => $request -> picture,
            'address' => $request -> address,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'status' => $request -> status,
        ]);
        $proveedores = DB::table('suppliers')->get();
        return view('/admin/proveedores/list')->with('proveedores', $proveedores);
    }
    public function editar($id){//Vista
        $proveedor = DB::table('suppliers')->where('id', $id)->first();
        return view('admin/proveedores/edit')->with('proveedor', $proveedor);
    }
    public function actualizar(Request $request, $id){//Proceso
        DB::table('suppliers')->where('id',$id)
        ->update([
            'name' => $request -> name,
            'contact_name' => $request -> contact_name,
            'picture' => $request -> picture,
            'address' => $request -> address,
            'phone' => $request -> phone,
            'email' => $request -> email,
            'status' => $request -> status,
        ]);
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
