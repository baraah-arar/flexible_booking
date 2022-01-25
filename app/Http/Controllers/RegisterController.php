<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Facades\Validator;
use DB;
use Mail;
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
        $attributes['role'] = 1;
        // creating the new user
        $user = UserProfile::create($attributes);
        // login the new user
        auth()->login($user);
        // redirect after creating new user
        return back()->with('success', 'Your account has been created successfully.');
    }

    public function verifyByEmailForm(){
        // $this->sendCodeVerify();       
        return view('auth.verifyAccount');
    }

    public function sendCodeVerify(){
        // insert new row to password_resets
        $userEmail = auth()->user()->email;
        $code = random_int(1000, 9999);
        DB::table('password_resets')->insert([
            'email' => $userEmail,
            'token' => $code,
            'created_at' => now(),
        ]);
        // send Email
        Mail::send('auth.verifyEmail', ['code' => $code], function($message) use($userEmail){
            $message->to($userEmail);
            $message->subject('Verify Account');
        });
        return view('auth.verifyAccount');
    }

    public function verifyByEmail()
    {
        // validate request
        $attributes = request()->validate([
            'ver_code' => 'required|min:4|max:4'
        ]);
        // var_dump(request()->all());
        // check it the code from password_resets table
        $checkRecord = DB::table('password_resets')->where([
            'email' => auth()->user()->email,
            'token' => request()->ver_code
        ])->first();
        if(!$checkRecord){
            return redirect('verify-account')
                ->withInput()
                ->withErrors(['ver-code' => 'Your provided credentails could not be verified.']);
        }else{
            // update user_profile status
            UserProfile::where('email', auth()->user()->email)->update(['status' => 'activated']);
            // delete the row from password_resets table
            DB::table('password_resets')->where(['email' => auth()->user()->email])->delete();
            // redirect
            return redirect('/')->with('success', 'Your account has been verified successfully.');
        }
    }
}
