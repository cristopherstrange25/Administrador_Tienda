<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    //
    public function register(Request $request)
    {
     // Validación de los campos
     $request->validate([
        'name' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'birthdate' => 'required|date',
        'address' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:employees',
        'phone' => 'required|string|max:15',
        'password' => 'required|string',
    ]);

    // Inserción en la base de datos
    DB::table('employees')->insert([
        'name' => $request->name,
        'title' => $request->title,
        'birthdate' => $request->birthdate,
        'address' => $request->address,
        'email' => $request->email,
        'phone' => $request->phone,
        'password' => $request->password, // Encripta la contraseña antes de guardarla
    ]);

    // Mostrar el formulario de registro si es un GET
    return redirect()->route('login');  // Asegúrate de que esta vista exista
    }


    public function registro()
    {
        return view('/admin/login/registro'); // Asegúrate de que esta vista exista
    }

    public function inicio()
    {
        return view('/admin/login/login'); // Asegúrate de que esta vista exista
    }

    public function login(Request $request)
{
    // Validar que el correo y la contraseña estén presentes
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

    // Buscar el usuario por el correo electrónico
    $user = DB::table('employees')->where('email', $request->email)->first();

    // Verificar si el usuario existe y si la contraseña coincide
    if ($user && $request->password === $user->password) {
        // Si la autenticación es exitosa, iniciar la sesión manualmente
        session(['user_id' => $user->id]); // Guardamos solo el ID del usuario

        // Redirigir a la página principal o la página deseada
        return view('/admin/plantilla/inicio'); 
    }

    // Si la autenticación falla, retornar al formulario de login con un error
    return back()->withErrors([
        'email' => 'Las credenciales no coinciden con nuestros registros.',
    ]);
}






    public function logout(Request $request){
        Auth::logout();

        $request -> session() -> invalidate();
        $request -> session() -> regenerateToken();

        return view('/admin/inicio/login');
    }
}
