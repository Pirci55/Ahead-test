<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class Cage extends Controller
{
    public function show(Request $request)
    {
        try {
            $request->validate([
                'cage_id' => [
                    'required',
                    'integer',
                    'exists:cages,id',
                ],
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('home');
        }

        return view('cages', [
            'cage' => Models\Cage::find($request->input('cage_id')),
            'animals' => Models\Animal::all(),
        ]);
    }
    public function new_cage()
    {
        $cage = new Models\Cage();
        $cage->name = 'Новая клетка';
        $cage->capacity = 1;
        $cage->save();

        return redirect()->route('home');
    }
    public function update_cage(Request $request)
    {
        $request->validate([
            'cage_id' => ['required', 'integer'],
        ]);

        $cage = Models\Cage::find($request->input('cage_id'));

        if ($request->has('edit_cage')) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'capacity' => ['required', 'integer', 'min:0', 'max:9999'],
            ]);

            $cage->name = $request->input('name');
            $cage->capacity = $request->input('capacity');
            $cage->save();

            return redirect()->back();
        } elseif ($request->has('delete_cage')) {
            if (!$cage->animals->count()) {
                $cage->delete();
                return redirect()->back();
            }
        }

        return redirect()->route('home');
    }
}
