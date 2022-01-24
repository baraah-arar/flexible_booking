<?php

namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\BookingService;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::where([['end_date', '<', Carbon::now()],['status','<>','confirmed']])
        ->update(['status' => 'out_of_date']);
        $bookings = Booking::latest()->paginate(15);
        return view('dashboard.booking.booking', compact('bookings'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function bookingservices($id)
    {
       //ddd($id);
      // $booking = Booking::where('id',$id)->first();
       $booking = Booking::with('services')->find($id);
        return view('dashboard.booking.booking_services', ['booking' => $booking]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function confirm($id)
    {
        $booking = Booking::find($id);
        $booking->status = 'confirmed';
        $booking->save();

        return redirect()->route('dashboard.bookings_index')
        ->with('success','Booking confirmed successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm_services($booking_id, $service_id)
    {
        $service = BookingService::where([
            ['bkg_id', '=', $booking_id],
            ['srv_id', '=', $service_id]
            ])->update(['status' => 'confirmed']);
            return redirect()->route('dashboard.booking.services', [$booking_id])
            ->with('success','Booking service confirmed successfully');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
