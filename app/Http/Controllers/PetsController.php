<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pets;

class PetsController extends Controller
{
    //
public function index()
{
    $pets = Pets::all();
    return view('pets.index', compact('pets'));
}

public function create()
{
    return view('pets.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'description' => 'required|string',
        'age' => 'required|integer',
        'image' => 'required|image|max:2048',
    ]);

    $imagePath = $request->file('image')->store('images', 'public');

    Pets::create([
        'name' => $request->name,
        'type' => $request->type,
        'description' => $request->description,
        'age' => $request->age,
        'image' => $imagePath,
    ]);

    return redirect()->route('pets.index')->with('success', 'Pet added successfully.');
}

public function show(int $id)
{
    $pet = Pets::findOrFail($id);
    return view('pets.show', compact('pet'));
}

public function edit(int $id)
{
    $pet = Pets::find($id);
    if (!$pet) {
        return response()->json(['message' => 'Pet not found'], 404);
    }
    return response()->json($pet);

    if (request()->ajax()) {
        return response()->json($pet);
    }

    return view('pets.edit', compact('pet'));
}


public function update(Request $request, $id)
{
    $id = (int) $id;

    $request->validate([
        'name' => 'required|string|max:255',
        'type' => 'required|string|max:255',
        'description' => 'required|string',
        'age' => 'required|integer',
        'image' => 'nullable|image|max:2048',
    ]);

    $pet = Pets::findOrFail($id);

    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('images', 'public');
        $pet->image = $imagePath;
    }

    $pet->update([
        'name' => $request->name,
        'type' => $request->type,
        'description' => $request->description,
        'age' => $request->age,
    ]);

    return redirect()->route('pets.index')->with('success', 'Pet updated successfully.');
}


public function destroy(int $id)
{
    $pet = Pets::findOrFail($id);
    $pet->delete();

    return redirect()->route('pets.index')->with('success', 'Pet deleted successfully.');
}
}
