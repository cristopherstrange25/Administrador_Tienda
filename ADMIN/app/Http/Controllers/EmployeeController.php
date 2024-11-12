<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    // CRUD Create Read Update Delete
    public function indice()
    {
        $employees = DB::table('employees')->get();
        return view('admin.empleados.list')->with('employees', $employees); // Cambié 'administradores' por 'empleados'
    }
    
    public function crear()
    {
        return view('admin.empleados.create'); // Cambié la ruta de la vista
    }

    public function guardar(Request $request)
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

        // Redireccionar a la lista de empleados
        return redirect()->route('admin.empleados.list')->with('success', 'Empleado registrado exitosamente.');
    }
    public function editar($id)
    {
        // Vista de edición
        $employee = DB::table('employees')->where('id', $id)->first();
        if (!$employee) {
            return redirect()->route('admin.empleados.list')->withErrors(['error' => 'Empleado no encontrado.']);
        }
        return view('admin.empleados.edit', compact('employee')); // 'compact' es más limpio
    }
    
    public function actualizar(Request $request, $id)
    {
        // Validar los datos recibidos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email',
            'birthdate' => 'required|date',
            'current_password' => 'required|string',  // La contraseña actual es opcional
            'password' => 'required|string', // Nueva contraseña, si se provee, debe coincidir
        ]);
    
        // Buscar al empleado en la base de datos
        $employee = DB::table('employees')->where('id', $id)->first();
    
        // Verificar si el empleado existe
        if (!$employee) {
            return redirect()->route('admin.empleados.list')->withErrors(['error' => 'Empleado no encontrado.']);
        }
    
        // Verificar si la contraseña actual es correcta (si se proporciona)
        // Comparar la contraseña actual con la almacenada (sin hash)
        if ($request->filled('current_password') && $request->current_password !== $employee->password) {
            return redirect()->back()->withErrors(['current_password' => 'La contraseña actual es incorrecta.']);
        }
    
        // Preparar los datos para la actualización
        $updateData = [
            'name' => $validatedData['name'],
            'title' => $validatedData['title'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
            'email' => $validatedData['email'],
            'birthdate' => $validatedData['birthdate'],
        ];
    
        // Si se proporciona una nueva contraseña, la actualizamos
        if ($request->filled('password')) {
            $updateData['password'] = $validatedData['password']; // No encriptamos la nueva contraseña
        }
    
        // Actualizar la base de datos con los nuevos datos
        $updated = DB::table('employees')->where('id', $id)->update($updateData);
    
        // Verificar si la actualización fue exitosa
        if ($updated > 0) {
            return redirect()->route('admin.empleados.list')->with('success', 'Datos actualizados correctamente.');
        } else {
            return redirect()->back()->withErrors(['error' => 'No se realizaron cambios o la actualización falló.']);
        }
    }
    

    public function mostrar($id)
    {
        // Vista para mostrar un empleado
        $employee = DB::table('employees')->where('id', $id)->first(); 
        return view('admin.empleados.show')->with('employee', $employee); // Corregí 'administrador' por 'employee'
    }

    public function borrar($id)
{
    // Eliminar los pedidos relacionados con el empleado
    DB::table('orders')->where('employees_id', $id)->delete();

    // Ahora, eliminar al empleado
    $deleted = DB::table('employees')->where('id', $id)->delete();

    // Verificar si el empleado fue eliminado correctamente
    if ($deleted) {
        return redirect()->route('admin.empleados.list')->with('success', 'Empleado eliminado exitosamente.');
    } else {
        return redirect()->back()->withErrors(['error' => 'No se pudo eliminar al empleado.']);
    }
}

}
