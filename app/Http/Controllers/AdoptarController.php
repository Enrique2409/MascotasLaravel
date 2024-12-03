<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adoptar;
use App\Models\Pets;

class AdoptarController extends Controller
{
    public function index()
    {
        $pets = Pets::all();
        $adoptar = Adoptar::with('pet')->get();
        return view('adoptar.index', compact('pets', 'adoptar'));
    }

    public function create()
    {
        return view('adopta.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'mensaje' => 'required',
            'id_mascota' => 'required'
        ]);

        $adoptar = new Adoptar();
        $adoptar->nombre = $request->nombre;
        $adoptar->email = $request->email;
        $adoptar->telefono = $request->telefono;
        $adoptar->direccion = $request->direccion;
        $adoptar->mensaje = $request->mensaje;
        $adoptar->id_mascota = $request->id_mascota;
        $adoptar->save();

        return redirect()->route('adopta')->with('info', 'Mensaje enviado correctamente');
    }

    public function show(int $id)
    {
        $adoptar = Adoptar::findOrFail($id);
        return view('adopta.show', compact('adoptar'));
    }

    public function edit(int $id)
    {
        $adoptar = Adoptar::find($id);
        if (!$adoptar) {
            return response()->json(['message' => 'Pet not found'], 404);
        }
        return response()->json($adoptar);

        if (request()->ajax()) {
            return response()->json($pet);
        }

        return view('adopta.edit', compact('adoptar'));
    }


    public function update(Request $request, $id)
    {
        $id = (int) $id;

        $request->validate([
            'nombre' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'telefono' => 'required|string',
            'direccion' => 'required|String',
            'mensaje' => 'required|String',
            'id_mascota' => 'required'
        ]);

        $adoptar = Adoptar::findOrFail($id);

        $adoptar->update([
            'nombre' => $request->nombre,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'mensaje' => $request->mensaje,
            'id_mascota' => $request->id_mascota
        ]);

        return redirect()->route('adopta.index')->with('success', 'Adoptar actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $adoptar = Adoptar::findOrFail($id);
        $adoptar->delete();

        return redirect()->route('adopta.index')->with('success', 'Adopción eliminada exitosamente.');
    }
}
