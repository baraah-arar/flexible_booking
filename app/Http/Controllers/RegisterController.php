<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    // public function __construct(){
    //     $this->redirectRoute = route('view_register');
    // }

    
    protected $redirect = '/#register';

    public function create(){
        return redirect('/#register');
    }

    public function store(){
        // var_dump(request()->url());
        $rules =[
            'f_name'   => 'required|max:255',
            'l_name'   => 'required|max:255',
            'phone'    => 'required|min:9|max:12|unique:user_profiles,phone',
            'email'    => 'required|email|max:255|unique:user_profiles,email',
            'password' => 'required|min:8|max:255',
        ];
        $validator = Validator::make(request()->all(), $rules);
    
        if ($validator->fails()) {
            return redirect()
            ->route('view_register')
            ->withErrors($validator)
            ->withInput();
        }
        $attributes = request()->validate([
            'f_name'   => 'required|max:255',
            'l_name'   => 'required|max:255',
            'phone'    => 'required|min:9|max:12|unique:user_profiles,phone',
            'email'    => 'required|email|max:255|unique:user_profiles,email',
            'password' => 'required|min:8|max:255',
        ]);
        // creating the new user
        $user = UserProfile::create($attributes);
        // login the new user
        auth()->login($user);
        // redirect after creating new user
        return redirect('/#login-modal')->with('success', 'Your account has been created successfully, please login now.');
    }

    

    public function verifyByEmail()
    {
        

    }
}
