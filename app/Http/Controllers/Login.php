<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rules;

class Login extends Controller
{
    public function show()
    {
        return view('login');
    }
    public function login_user(Request $request)
    {
        try {
            $request->validate([
                'email' => [
                    'required',
                    'string',
                    'lowercase',
                    'email',
                    'max:255'
                ],
                'password' => ['required', Rules\Password::defaults()],
            ]);
        } catch (ValidationException $e) {
            return redirect()->route('login')
                ->withErrors($e->errors())
                ->withInput();
        }

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        return redirect()->route('login')->withInput();
    }
}
