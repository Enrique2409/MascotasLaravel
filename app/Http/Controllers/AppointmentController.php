<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function create()
    {
        return view('appointments.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        Appointment::create([
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita creada exitosamente.');
    }

    public function index()
    {
        $appointments = Appointment::all();
        return view('citas.index', compact('appointments'));
    }

    public function edit($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.edit', compact('appointment'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date|after_or_equal:today',
            'time' => 'required|date_format:H:i',
        ]);

        $appointment = Appointment::findOrFail($id);
        $appointment->update([
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
        ]);

        return redirect()->route('citas.index')->with('success', 'Cita actualizada exitosamente.');
    }

    public function destroy($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return redirect()->route('citas.index')->with('success', 'Cita eliminada exitosamente.');
    }
}
