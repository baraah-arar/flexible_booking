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
        $type = (substr(request()->fullurl(), strpos(request()->fullurl(), 'services/') + 9));
        return view('components/services', 
            ['places' => Place::where('plc_type', $type)->get(),
            'services' => Service::all()]);
    }

    public function checkAvailability(){
        // ddd(request()->start_date);
        $attributes = request()->validate([
            'start_date' => 'required',
            'end_date'  => 'required',
        ]);
        $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
        $plc_id = request()->plc_id;
        // 1- check if two dates exist in booking table with same place
        $bookings_plc = Booking::where(
            'plc_id' , $plc_id)
            ->where('start_date', '>=' , $start)
            ->where('end_date', '<=' , $end) 
            ->get();
        // 2- if yes then return not allowed the place id reserved at the same time
        // 3- if not calculate the price
        // 4- 3- calculate the hours between two start&end dates        
        $diff_in_hours = Carbon::parse($end)->diffInHours(Carbon::parse($start));
        // 5- 3- calculate the cost depends on hours number (get cost per hour from places table)
        $plc_cost = Place::where('id', $plc_id)->first('price');
        $cost = intval($plc_cost['price']) * intval($diff_in_hours);

        $attributes['plc_id'] = request()->plc_id;
        $attributes['cost']   = $cost;
        $attributes['numberHours'] = $diff_in_hours;
        // 6- insert new booking row with status bending
        // 7- return success message
        
        // if(auth()->guest()){
        //     $msg = '<span>please <a class="font-medium underline" href="/contact#login-modal" >login</a> before sending your message</span>';
        //     // abort(403);
        //     return response()->json([
        //         "status" => fails,
        //         "data" => $attributes
        //     ]);
        // };
        
        return response()->json([
            "status" => true,
            "data" => $attributes
        ]);
    } 


    /* get hours from two dates
    $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 3:30:34');
    $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', '2015-5-5 9:30:34');
    $diff_in_hours = $to->diffInHours($from);
    print_r($diff_in_hours);// Output: 6
    */

    /* get records between two dates
        $users = User::whereBetween('created_at',[$request->start_date,$request->end_date])
        ->get();

    */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function create()
    {
        $attributes['start_date'] = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $attributes['end_date'] = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
        // $attributes['user_id'] = auth()->user()->id;
        $attributes['user_id'] = 1;
        $attributes['plc_id'] = request()->plc_id;
        // recalculate the cost to prevent wrong values
        $start  = Carbon::parse(request()->start_date)->format('Y-m-d H:00:00');
        $end    = Carbon::parse(request()->end_date)->format('Y-m-d H:00:00');
        $diff_in_hours = Carbon::parse($end)->diffInHours(Carbon::parse($start));
        // 5- 3- calculate the cost depends on hours number (get cost per hour from places table)
        $plc_cost = Place::where('id', request()->plc_id)->first('price');
        $cost = intval($plc_cost['price']) * intval($diff_in_hours);

        $attributes['cost'] = $cost;
        $attributes['status'] = 'bending';
        $attributes['payment_plan'] = 'hours';
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
                    BookingService::create(['srv_id'=> $value, 'bkg_id' => $bkg_id]);
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
