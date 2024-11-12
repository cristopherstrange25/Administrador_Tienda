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
    public function guardar(Request $request){//Proceso
        //dd($request);
        DB::table('categories')->insert([
            'name' => $request -> name,
            'description' => $request -> description,
            'picture' => $request -> picture,
            'status' => 'ACTIVO',
        ]);
        $categories = DB::table('categories')->where('status','ACTIVO')->get();
        return view('/admin/categorias/list')->with('categorias', $categories);
    }
    public function editar($id){//Vista
        $categoria = DB::table('categories')->where('id',$id)->first();
        return view('admin/categorias/edit')->with('categoria', $categoria);
    }
    public function actualizar(Request $request, $id){//Proceso
        DB::table('categories')->where('id',$id)
        ->update([
            'name' => $request -> name,
            'description' => $request -> description,
            'picture' => $request -> picture,
        ]);
        $categories = DB::table('categories')->where('status','ACTIVO')->get();
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
