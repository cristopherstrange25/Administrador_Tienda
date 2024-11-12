<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class OrderController extends Controller
{
    //CRUD Create Read Update Delete
    public function indice(){//vista
        $orders = DB::table('orders')->get();
        return view('/admin/pedidos/list')->with('pedidos', $orders);
    }
    public function crear(){//Vista
        return view('admin/pedidos/create');
    }
    public function guardar(Request $request){//Proceso
        //dd($request);
        DB::table('orders')->insert([
            'employees_id' => $request -> employees_id,
            'order_date' => $request -> order_date,
            'Deadline' => $request -> Deadline,
            'transportation' => $request -> transportation,
            'delivery_address' => $request -> delivery_address,
        ]);
        $pedidos = DB::table('orders')->get();
        return view('/admin/pedidos/list')->with('pedidos', $pedidos);
    }
    public function editar($id){//Vista
        $pedido = DB::table('orders')->where('id', $id)->first();
        return view('admin/pedidos/edit')->with('pedido', $pedido);
    }
    public function actualizar(Request $request, $id){//Proceso
        DB::table('orders')->where('id',$id)
        ->update([
            'employees_id' => $request -> employees_id,
            'order_date' => $request -> order_date,
            'Deadline' => $request -> Deadline,
            'transportation' => $request -> transportation,
            'delivery_address' => $request -> delivery_address,
        ]);
        $pedidos = DB::table('orders')->get();
        return view('/admin/pedidos/list')->with('pedidos', $pedidos);
    }
    public function mostrar($id){//Vista 
        $pedido = DB::table('orders')->where('id', $id)->first();
        return view('admin/pedidos/show')->with('pedido', $pedido);;
    }
    public function borrar($id){//Proceso
        $deleted = DB::table('orders')->where('id', $id )->delete();
        $pedidos = DB::table('orders')->get();
        return view('/admin/pedidos/list')->with('pedidos', $pedidos);
    }
}
