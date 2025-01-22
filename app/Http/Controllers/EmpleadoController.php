<?php

namespace App\Http\Controllers;

use App\Http\Requests\empleado\StoreEmpleadoRequest;
use App\Http\Requests\empleado\UpdateEmpleadoRequest;
use App\Models\Empleado;
use App\Models\Usuario;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::with('usuario')->paginate(10);

        return view('pages.employee.dashboard-employee', compact('empleados'));
    }

    public function create()
    {
        return view('sections.employee.addEmployee');
    }

    public function store(StoreEmpleadoRequest $request)
    {
        $validated = $request->validated();

        $nombres = explode(' ', $validated['nombre']);
        $inicialesNombres = array_reduce($nombres, function ($carry, $nombre) {
            return $carry . substr($nombre, 0, 1);
        }, '');

        $correo = strtolower($inicialesNombres . $validated['apellido_paterno'] . substr($validated['apellido_materno'], 0, 1) . '@sietesopas.org');
    
        $userCreated =  Usuario::create([
            'correo' => $correo,
            'password' => $validated['password']
        ]);

        Empleado::create([
            'nombre' => strtoupper($validated['nombre']),
            'apellido_paterno' => strtoupper($validated['apellido_paterno']),
            'apellido_materno' => strtoupper($validated['apellido_materno']),
            'celular' => $validated['celular'],
            'usuario_id' => $userCreated->id,
        ]);

        return to_route('empleados.index')->with('status', 'Empleado añadido correctamente');
    }

    public function show(Empleado $empleado)
    {
        return view('sections.employee.showEmployee', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('sections.employee.updateEmployee', compact('empleado'));
    }

    public function update(UpdateEmpleadoRequest $request, Empleado $empleado)
    {
        $validated = $request->validated();

        $empleado->update([
            'nombre' => strtoupper($validated['nombre']),
            'apellido_paterno' => strtoupper($validated['apellido_paterno']),
            'apellido_materno' => strtoupper($validated['apellido_materno']),
            'celular' => $validated['celular'],
        ]);

        return to_route('empleados.index')->with('status', 'Empleado actualizado correctamente');
    }

    public function destroy(Empleado $empleado)
    {
        $user = $empleado->usuario();
        
        $empleado->delete();
        $user->delete();
        
        return to_route('empleados.index')->with('status', 'Empleado eliminado correctamente');
    }
}
