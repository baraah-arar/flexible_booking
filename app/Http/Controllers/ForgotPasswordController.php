<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function showForgetPasswordForm(){
        return view('auth.forgetPassword');
    }

    public function submitForgetPasswordForm(){
        return ('submit process');
    }

    public function showResetPasswordForm(){
        return view('auth.resetPassword');
    }

    public function submitResetPasswordForm(){
        return ('reset process');
    }
}
