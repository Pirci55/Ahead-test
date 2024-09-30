<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class Home extends Controller
{
    public function show()
    {
        return view('home', [
            'animalsNotInCages' => Models\Animal::count(),
            'animalsInCages' => Models\Animal::whereNotNull('cage_id')->count(),
            'cagesCapacity' => Models\Cage::sum('capacity'),
            'cages' => Models\Cage::all()
        ]);
    }
}
