<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use App\Models\Service;
use App\Models\Booking;
use App\Models\Place;
use App\Models\BookingService;
use App\Models\Assessment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Carbon\Carbon;
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

    public function displayreservations()
    {
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
        return view('components/UserProfileSections/Crud-user-reservations');
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
        $reservations = auth()->user()->bookings->where('id',$id)->first();
        $allServices  = Service::all();
        return view('components/UserProfileSections/user-reservations', 
                    ['reservations' => $reservations,
                    'allServices' => $allServices]);
    }

    function checkTimeAvailability(){
        if(Booking::where('id', request()->bkg_id)->first('status')['status'] == 'pending'){
            $attributes = request()->validate([
                'start_date' => 'required',
                'end_date'  => 'required',
            ]);
            $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
            $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
            $plc_id = request()->plc_id;
            // 1- check if two dates exist in booking table with same place
            $bookings_plc = Booking::where('plc_id' , $plc_id)->get();
            if($bookings_plc->count()>0){
                foreach($bookings_plc as $booking){
                    if($booking->id != request()->bkg_id){
                        if($booking->status != 'canceled'){
                            $oldStart  = Carbon::parse($booking->start_date);
                            $oldEnd    = Carbon::parse($booking->end_date);
                            if(Carbon::parse(request()->start_date)->betweenIncluded($oldStart, $oldEnd) || Carbon::parse(request()->end_date)->betweenIncluded($oldStart, $oldEnd)
                                || $oldStart->betweenIncluded(Carbon::parse(request()->start_date), Carbon::parse(request()->end_date))){
                                return response()->json([
                                    "status" => false,
                                    "message" => "unavailable, please choose another time"
                                ]);
                            }
                        }
                    }else{
                        // ddd(request()->all);
                        // calculate number of hours && cost
                        $cost = 0;
                        $plc_cost = Place::where('id', request()->plc_id)->first('price');
                        if(Booking::where('id', request()->bkg_id)->first('payment_plan')['payment_plan'] == 'hours'){
                            $diff_in_hours = Carbon::parse($end)->diffInHours(Carbon::parse($start));            
                            $cost = intval($plc_cost['price']) * intval($diff_in_hours);
                            $attributes['numberHours'] = $diff_in_hours;
                        }
                        elseif(Booking::where('id', request()->bkg_id)->first('payment_plan')['payment_plan'] == 'days'){
                            $diff_in_days = Carbon::parse($end)->diffInDays(Carbon::parse($start));            
                            $cost = intval($plc_cost['price']) * intval($diff_in_days);
                            $attributes['numberDays'] = $diff_in_days;
                        }
                        $attributes['cost'] = $cost;
                        $attributes['plc_id'] = $plc_id;
                        return response()->json([
                            "status" => true,
                            "data" => $attributes
                        ]);
                    }
                }
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserProfile  $userProfile
     * @return \Illuminate\Http\Response
     */
    public function editReservation($id)
    {
        // dd(request()->bkg_id);
        if(Booking::where('id', request()->bkg_id)->first('status')['status'] == 'pending'){
            $attributes = request()->validate([
                'start_date' => 'required',
                'end_date'  => 'required',
            ]);
            $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
            $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
            $cost = 0;
            $plc_cost = Place::where('id', request()->plc_id)->first('price');
            
            if(Booking::where('id', request()->bkg_id)->first('payment_plan')['payment_plan'] == 'hours'){
                $diff_in_hours = Carbon::parse($end)->diffInHours(Carbon::parse($start));            
                $cost = intval($plc_cost['price']) * intval($diff_in_hours);
                // $attributes['numberHours'] = $diff_in_hours;
            }
            elseif(Booking::where('id', request()->bkg_id)->first('payment_plan')['payment_plan'] == 'days'){
                $diff_in_days = Carbon::parse($end)->diffInDays(Carbon::parse($start));            
                $cost = intval($plc_cost['price']) * intval($diff_in_days);
                // $attributes['numberDays'] = $diff_in_days;
            }
            // $attributes['cost'] = $cost;
            // $attributes['plc_id'] = $plc_id;
            Booking::where('id', request()->bkg_id)->update(['start_date' => $start, 'end_date' => $end, 'cost' => $cost]);
            session()->flash('success', 'Your reservations updated successfully.');
            return response()->json([
                "status" => true,
                "data" => request()->bkg_id
            ]);
        }
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

     * @return \Illuminate\Http\Response
     */
    public function cancelReservation()
    {   
        if(!request()->srv_id){
            if(Booking::where('id', request()->bkg_id)->first('status')['status'] == 'pending'){
                Booking::where('id', request()->bkg_id)->update(['status' => 'canceled']);
                $services = Booking::where('id', request()->bkg_id)->first()->services;
                $attributes = ['status','canceled'];
                foreach($services as $service){
                    BookingService::where('srv_id', $service->id)
                     ->where('bkg_id', request()->bkg_id)->update(['status' => 'canceled']);
                };
                session()->flash('success', 'Your reservations updated successfully.');
                return response()->json([
                    "status" => true,
                    "data" => $services
                ]);
            }
        }else{
            if(BookingService::where('srv_id', request()->srv_id)
                ->where('bkg_id', request()->bkg_id)->first('status')['status'] == 'pending'){
                BookingService::where('srv_id', request()->srv_id)
                ->where('bkg_id', request()->bkg_id)->update(['status' => 'canceled']);
                session()->flash('success', 'Your reservations updated successfully.');
                return response()->json([
                    "status" => true,
                    "data" => request()->srv_id
                ]);
            }
        }
    }

    public function voting(){
        $attributes['bkg_id'] = request()->bkg_id;
        $attributes['value']   = intval(request()->value);
        $attributes['user_id'] = auth()->user()->id;
        if(Assessment::where(['user_id'=>auth()->user()->id, 'bkg_id'=>request()->bkg_id])->doesntExist())
            Assessment::create($attributes);
        else
            Assessment::where(['user_id'=>auth()->user()->id, 'bkg_id'=>request()->bkg_id])->update(['value' => $attributes['value']]);
        return response()->json([
            "status" => true,
            "data" => request()->all()
        ]);
    }
}
