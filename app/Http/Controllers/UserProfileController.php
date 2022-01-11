<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components/UserProfileSections.Change-user-settings');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function displayresetForm()
    {
        //
        return view('components/UserProfileSections.reset-password');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profileResetPassword(){
        // ddd(bcrypt(request()->old_password));
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
        return redirect('/')->with('success', 'your password updated successfuly. Please login again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function showReservation($id)
    {
        $reservations = auth()->user()->bookings->where('id',$id)[0];
        return view('components/UserProfileSections/user-reservations', ['reservations' => $reservations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function edit(UserProfile $userProfile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        // ddd(request()->all());
        $rules =[
            'f_name'   => 'required|max:255',
            'l_name'   => 'required|max:255',
            'phone'    => ['required','min:9','max:12',Rule::unique('user_profiles','phone')->ignore(auth()->user()->id)],
            'email'    => 'required|email|max:255|unique:user_profiles,email,' . auth()->user()->id,
        ];
        $validator = Validator::make(request()->all(), $rules);
        if($validator->fails()){
            return back()->withErrors($validator)->withInput();
        };
        UserProfile::where('id', auth()->user()->id)->update(request()->except(['_token']));
        return back()->with('success', 'your information updated successfuly');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserProfile $userProfile)
    {
        //
    }
}
