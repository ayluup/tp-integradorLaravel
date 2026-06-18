<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipo;
use App\Models\Aula;

class EquipoController extends Controller
{
    public function index()
    {
        $equipos = Equipo::with('aula')->get();
        $aulas = Aula::all();
        return view('equipos.index', compact('equipos', 'aulas'));
    }

    public function store(Request $request)
    {
        // Validación
        $request->validate([
            'nombre'        => 'required|string|max:255',
            'numero_serie'  => 'nullable|string',
            'descripcion'   => 'nullable|string',
            'aula_id'       => 'nullable|exists:aulas,id',
            'imagen'        => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Crear equipo
        $equipo = new Equipo();
        $equipo->nombre = $request->nombre;
        $equipo->numero_serie = $request->numero_serie;
        $equipo->descripcion = $request->descripcion;
        $equipo->aula_id = $request->aula_id;

        // 🔥 GUARDAR IMAGEN
        if ($request->hasFile('imagen')) {
            // Guarda en: storage/app/public/hardware/
            // Devuelve: "hardware/abc123.jpg"
            $ruta = $request->file('imagen')->store('hardware', 'public');
            
            // Guarda en BD: "storage/hardware/abc123.jpg"
            $equipo->imagen_ruta = 'storage/' . $ruta;
        }

        $equipo->save();

        return redirect()->route('equipos.index')->with('success', 'Equipo creado correctamente');
    }
}