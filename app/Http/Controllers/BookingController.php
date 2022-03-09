<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Place;
use App\Models\Service;
use App\Models\BookingService;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    public function checkAvailability(){
        // ddd(request()->start_date);
        if(auth()->guest()){
            $msg = '<span>please <a class="font-medium underline" href="'.url()->current().'#login-modal" >login</a> before Booking this space.</span>';
            // abort(403);
            session()->flash('failed', $msg);

            return response()->json([
                "status" => 'failed',
                "data" => $msg
            ]);
        };
        $attributes = request()->validate([
            'start_date' => 'required',
            'end_date'  => 'required',
        ]);
        $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
        $plc_id = request()->plc_id;
        if(Place::where('id', request()->plc_id)->first('status')['status'] == 'unavailable'){
            return response()->json([
                "status" => false,
                "message" => "this place is not available, please choose another place"
            ]); 
        }
        // 1- check if two dates exist in booking table with same place
        $bookings_plc = Booking::where('plc_id' , $plc_id)->get();
        if($bookings_plc->count()>0){
            foreach($bookings_plc as $booking){
                if($booking->status != 'canceled'){
                    $oldStart  = Carbon::parse($booking->start_date);
                    $oldEnd    = Carbon::parse($booking->end_date);
                    if(Carbon::parse(request()->start_date)->betweenExcluded($oldStart, $oldEnd) 
                        || Carbon::parse(request()->end_date)->betweenExcluded($oldStart, $oldEnd)
                        || (Carbon::parse(request()->start_date)->equalTo($oldStart) && Carbon::parse(request()->end_date)->equalTo($oldEnd))
                        || $oldStart->betweenExcluded(Carbon::parse(request()->start_date), Carbon::parse(request()->end_date))){
                        return response()->json([
                            "status" => false,
                            "message" => "unavailable, please choose another time"
                        ]);
                    }
                }
            }
        }
        $plc_cost = Place::where('id', request()->plc_id)->first('price');
        // if(Place::where('id', request()->plc_id)->first('plc_type')['plc_type'] == 'meeting'){
            $diff_in_hours = Carbon::parse($end)->diffInHours(Carbon::parse($start));            
            $cost = number_format($plc_cost['price'] * intval($diff_in_hours),2);
            $attributes['duration'] = $diff_in_hours;
        // }
        // elseif(Place::where('id', request()->plc_id)->first('plc_type')['plc_type'] == 'private'){
        //     $diff_in_days = Carbon::parse($end)->diffInDays(Carbon::parse($start));
        //     if($diff_in_days == 0) $diff_in_days = 1;           
        //     $cost = intval($plc_cost['price']) * intval($diff_in_days);
        //     $attributes['duration'] = $diff_in_days;
        // };

        $attributes['plc_id'] = request()->plc_id;
        $attributes['cost']   = $cost;
        // 6- insert new booking row with status bending
        // 7- return success message
        
        return response()->json([
            "status" => true,
            "data" => $attributes
        ]);
    } 

    public function checkAvailabilityIndivi(){
        if(auth()->guest()){
            $msg = '<span>please <a class="font-medium underline" href="/contact#login-modal" >login</a> before Booking this space.</span>';
            // abort(403);
            session()->flash('failed', $msg);

            return response()->json([
                "status" => 'failed',
                "data" => $attributes
            ]);
        };
        $attributes = request()->validate([
            'start_date' => 'required',
            'end_date'  => 'required',
        ]);
        $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
        $diff_in_hours  = Carbon::parse($end)->diffInHours(Carbon::parse($start));
        $places = Place::where('plc_type', 'individual')->where('status', '!=', 'out_of_service')->get();
        foreach($places as $index => $place){
            $placeBookings = $place->bookings;
            if(isset($placeBookings)){
                foreach($placeBookings as $key => $plcBokking){
                    if($plcBokking->status == 'pending' || $plcBokking->status == 'confirmed'){
                        $oldStart = Carbon::parse($plcBokking->start_date);
                        $oldEnd   = Carbon::parse($plcBokking->end_date);
                        
                        if(Carbon::parse(request()->start_date)->betweenExcluded($oldStart, $oldEnd) 
                            || Carbon::parse(request()->end_date)->betweenExcluded($oldStart, $oldEnd)
                            || (Carbon::parse(request()->start_date)->equalTo($oldStart) && Carbon::parse(request()->end_date)->equalTo($oldEnd))
                            || $oldStart->betweenExcluded(Carbon::parse(request()->start_date), Carbon::parse(request()->end_date))){
                            $places->forget($index);
                            break;
                            // return response()->json([
                            //     "status" => true,
                            //     "data" => $places
                            // ]);
                        }
                    }
                }
            }
        }
        return response()->json([
            "status" => true,
            "start"  => $start,
            "end"    => $end,
            "hours"  => $diff_in_hours,
            "data"   => $places->take(5),
        ]);
    }

    public function createIndivi(){
        if(auth()->guest()){
            $msg = '<span>please <a class="font-medium underline" href="/contact#login-modal" >login</a> before Booking this space.</span>';
            // abort(403);
            session()->flash('failed', $msg);

            return response()->json([
                "status" => 'failed',
                "data" => "please login to your account."
            ]);
        };
        if(auth()->user()->status != 'active'){
            $msg = '<span>failed please activate your account.</span>';
            // abort(403);
            session()->flash('failed', $msg);

            return response()->json([
                "status" => 'failed',
                "data" => "please activate your account."
            ]);
        };
        $attributes = request()->validate([
            'start_date' => 'required',
            'end_date'   => 'required',
            'plc_id'     => 'required'
        ]);
        $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
        $diff_in_hours  = Carbon::parse($end)->diffInHours(Carbon::parse($start));
        $plc_cost = Place::where('id', request()->plc_id)->first('price');
        $cost = intval($plc_cost['price']) * intval($diff_in_hours);

        $attributes['cost'] = $cost;
        $attributes['user_id'] = auth()->user()->id;
        $attributes['payment_plan'] = 'hours';
        $attributes['status'] = 'pending';
        $item = Booking::firstOrCreate($attributes);
        session()->flash('success', 'Your reservations created successfully, please manage your reservations from your profile');
        return response()->json([
            "status" => true,
            "data" => request()->all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create()
    {
        if(auth()->guest()){
            $msg = '<span>please <a class="font-medium underline" href="/contact#login-modal" >login</a> before sending your message</span>';
            // abort(403);
            session()->flash('failed', $msg);

            return response()->json([
                "status" => 'failed',
                "data" => $attributes
            ]);
        };
        if(auth()->user()->status != 'active'){
            $msg = '<span>failed please activate your account.</span>';
            // abort(403);
            session()->flash('failed', $msg);

            return response()->json([
                "status" => 'failed',
                "data" => "please activate your account."
            ]);
        };
        $attributes['start_date'] = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $attributes['end_date'] = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
        $attributes['user_id'] = auth()->user()->id;
        $plc_id = request()->plc_id;
        // $attributes['user_id'] = 1;
        $attributes['plc_id'] = request()->plc_id;
        // recalculate the cost to prevent wrong values
        $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');

        $bookings_plc = Booking::where('plc_id' , $plc_id)->get();
        if($bookings_plc->count()>0){
            foreach($bookings_plc as $booking){
                if($booking->status != 'canceled'){
                    $oldStart  = Carbon::parse($booking->start_date);
                    $oldEnd    = Carbon::parse($booking->end_date);
                    if(Carbon::parse(request()->start_date)->betweenExcluded($oldStart, $oldEnd) 
                        || Carbon::parse(request()->end_date)->betweenExcluded($oldStart, $oldEnd)
                        || (Carbon::parse(request()->start_date)->equalTo($oldStart) && Carbon::parse(request()->end_date)->equalTo($oldEnd))
                        || $oldStart->betweenExcluded(Carbon::parse(request()->start_date), Carbon::parse(request()->end_date))){
                        return response()->json([
                            "status" => false,
                            "message" => "unavailable, please choose another time"
                        ]);
                    }
                }
            }
        }
        $plc_cost = Place::where('id', request()->plc_id)->first('price');
        // if(Place::where('id', request()->plc_id)->first('plc_type')['plc_type'] == 'meeting'){
            $diff_in_hours = Carbon::parse($end)->diffInHours(Carbon::parse($start));            
            $cost = number_format($plc_cost['price'] * intval($diff_in_hours), 2);
            // $attributes['numberHours'] = $diff_in_hours;
            $attributes['payment_plan'] = 'hours';
        // }
        // elseif(Place::where('id', request()->plc_id)->first('plc_type')['plc_type'] == 'private'){
        //     $diff_in_days = Carbon::parse($end)->diffInDays(Carbon::parse($start)); 
        //     if($diff_in_days == 0) $diff_in_days = 1;           
        //     $cost = intval($plc_cost['price']) * intval($diff_in_days);
        //     // $attributes['numberDays'] = $diff_in_days;
        //     $attributes['payment_plan'] = 'days';
        // };

        $attributes['cost'] = $cost;
        $attributes['status'] = 'pending';
        // Booking::create($attributes);
        $item = Booking::firstOrCreate($attributes);

        if ($item->wasRecentlyCreated === true) {
            // session()->flash('success', 'booking created');
            return response()->json([
                "status" => true,
                "data" => $item
            ]);
        } else {
            return response()->json([
                "status" => false,
                "data" => 'something went wrong'
            ]);
        }
    }

    function createextraservice(){
        // $data = json_decode(request()->all());
        $data = request()->all();
        foreach($data as $key => $value){
            if($key == 0 ){
                $bkg_id = $value;
                $isExist = Booking::where('id', $value)->doesntExist();
                if($isExist){
                    return response()->json([
                        "status" => false,
                        "data" => $data
                    ]);
                }
            }else{
                $isExist = Service::where('id', $value)->doesntExist();
                if($isExist){
                    return response()->json([
                        "status" => false,
                        "data" => $data
                    ]);
                }else{
                        if(BookingService::where(['srv_id' => $value,'bkg_id' => $bkg_id])->doesntExist()
                            || BookingService::where(['srv_id' => $value,'bkg_id' => $bkg_id, 'status' => 'canceled'])->exists())
                            BookingService::create(['srv_id'=> $value, 'bkg_id' => $bkg_id]);
                        else
                            return response()->json([
                                "status" => false,
                                "data" => $data
                            ]);
                }
            }
        }
        session()->flash('success', 'Your reservations created successfully, please manage your reservations from your profile');
        return response()->json([
            "status" => true,
            "data" => $data
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
