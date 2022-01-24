<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Booking;
use App\Models\BookingService;

class SessionsController extends Controller
{

    public function index(){
        return redirect('/#login-modal');
    }

    public function create(){
        // var_dump(request()->all());
        $attributes = request()->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        
        if (Auth::attempt($attributes)) {
            if(auth()->user()->bookings->count() > 0){
                foreach(auth()->user()->bookings as $booking){
                    if(Carbon::parse($booking->end_date)->format('Y-m-d H:00:00') < Carbon::now()->format('Y-m-d H:00:00')
                        && $booking->status != 'canceled'){
                        Booking::where('id', $booking->id)->update(['status' => 'outofdate']);
                        $services = Booking::where('id', $booking->id)->first()->services;
                        $attributes = ['status','canceled'];
                        foreach($services as $service){
                            BookingService::where('srv_id', $service->id)
                            ->where('bkg_id', $booking->id)->update(['status' => 'canceled']);
                        };
                    }
                }
            };
            request()->session()->regenerate();

            return back()->with('success', 'Welcome back');
        }
        $url = url()->previous();
        return redirect($url.'#login-modal')
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
