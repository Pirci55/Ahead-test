<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Illuminate\Validation\ValidationException;

class Animal extends Controller
{
    public function show(Request $request)
    {
        try {
            $request->validate([
                'animal_id' => [
                    'required',
                    'integer',
                    'exists:animals,id',
                ],
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('home');
        }

        return view('animals', [
            'cages' => Models\Cage::all(),
            'animal' => Models\Animal::find($request->input('animal_id')),
        ]);
    }
    public function new_animal()
    {
        $animal = new Models\Animal();
        $animal->species = 'Новый вид';
        $animal->name = 'Новое животное';
        $animal->description = 'Описание';
        $animal->age = 1;
        $animal->save();

        return redirect()->back();
    }
    public function update_animal(Request $request)
    {
        $request->validate([
            'animal_id' => ['required', 'integer'],
            'cage_id' => ['integer'],
        ]);

        $animal = Models\Animal::find($request->input('animal_id'));

        if ($request->has('set_cage')) {
            $cage = Models\Cage::find($request->input('cage_id'));
            if ($cage->animals->count() < $cage->capacity) {
                $animal->cage_id = $request->input('cage_id');
                $animal->save();
            }
        } elseif ($request->has('drop_cage')) {
            $animal->cage_id = null;
            $animal->save();
        } elseif ($request->has('edit_animal')) {
            $animal->cage_id = $request->input('cage_id');
            $animal->species = $request->input('species');
            $animal->name = $request->input('name');
            $animal->description = $request->input('description');
            $animal->age = $request->input('age');
            $animal->save();
        } elseif ($request->has('delete_animal')) {
            $animal->delete();
        }

        return redirect()->back();
    }
}
