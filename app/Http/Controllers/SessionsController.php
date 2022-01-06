<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{

    public function create(){
        return redirect('/#login-modal');
    }

    public function store(){
        // var_dump(request()->all());
        $attributes = request()->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($attributes)) {
            request()->session()->regenerate();

            return redirect('/')->with('success', 'Welcome back');
        }
        return redirect('/#login-modal')
            ->withInput()
            ->withErrors(['email' => 'Your provided credentails could not be verified.']);
    }

    public function destroy(){
        auth()->logout();
        // request()->session()->invalidate();
        // request()->session()->regenerateToken();

        return redirect('/')->with('success', 'Goodbye');
    } 
}
