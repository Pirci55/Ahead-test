<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Logout extends Controller
{
    public function logout_user()
    {
        Auth::logout();

        return redirect()->route('home');
    }
}
