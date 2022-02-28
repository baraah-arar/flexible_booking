<?php

namespace App\Http\Controllers;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminProfileController extends Controller
{
    public function displayresetpassword()
    {
        return view('dashboard.reset-adminpassword');
    }

    public function resetpassword()
    {
        $attributes = [
            'old_password' => 'required',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required',
        ];

        $validator = Validator::make(request()->all(), $attributes);

        if($validator->fails()){
            return back()->withErrors($validator);
        };
        if(!Hash::check(request()->old_password, auth()->user()->password))
            return back()->withErrors(['old_password' => 'the given password does\'nt match current password' ]);

        UserProfile::where('id', auth()->user()->id)
                    ->update(['password' => bcrypt(request()->password)]);
        auth()->logout();
        return redirect()->route('dashboard.index')->with('success', 'your password updated successfuly');
    }



    public function displayprofile()
    {
        return view('dashboard.Change-admin-settings');
    }


    public function editprofile()
    {
        $rules =[
            'f_name'   => 'required|max:255',
            'l_name'   => 'required|max:255',
            'email'    => 'required|email|max:255|unique:user_profiles,email,' . auth()->user()->id,
        ];
        $validator = Validator::make(request()->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        };
        UserProfile::where('id', auth()->user()->id)->update(request()->except(['_token']));
        return redirect()->route('dashboard.index')->with('success', 'your information updated successfuly');
    }



}
