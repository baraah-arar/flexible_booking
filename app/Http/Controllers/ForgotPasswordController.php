<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserProfile;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm(){
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(Request $requset){
        // validate the email
        $attributes = request()->validate([
            'email' => 'required|email',
        ]);
        $user = UserProfile::where('email', request()->email)->first();
        // email doesn't exists
        if(!$user){
            return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentails could not be verified.']);
        }else{
            // create random token for the link
            $token = Str::random(46);
            // add new row to reset password
            DB::table('password_resets')->insert([
                'email' => request()->email,
                'token' => $token,
                'created_at' => now(),
            ]);
            // send email to the user
            Mail::send('auth.forgetPasswordEmail', ['token' => $token], function($message) use($requset){
                $message->to(request()->email);
                $message->subject('Reset Password');
            });
            // redirect
            return back()
            ->withInput()
            ->with(['success' => 'Check your email please, Email is sent.']);
        }
    }

    public function showResetPasswordForm($token){
        return view('auth.resetPassword', ['token' => $token]);
    }

    public function submitResetPasswordForm(){
        // validate
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8|max:255|confirmed',
            'password_confirmation' => 'required',
        ]);
        // check email & token
        $checkEmail = DB::table('password_resets')->where([
            'email' => request()->email,
            'token' => request()->token
        ])->first();
        if(!$checkEmail){
            return back()
            ->withInput()
            ->withErrors(['email' => 'Your provided credentails could not be verified.']);
        }else{
            // update password
            UserProfile::where('email', request()->email)->update(['password' => bcrypt(request()->password)]);
            // modify password_reset table
            DB::table('password_resets')->where(['email' => request()->email])->delete();
            // redirect
            return redirect('/#login-modal')->with('success', 'Your account has been updated successfuly, please login now.');
        }
    }
}
