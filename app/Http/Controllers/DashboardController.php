<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Opinion;
use App\Models\Service;
use App\Models\Place;
use App\Models\UserProfile;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function statistics()
    {
        return view('dashboard.statistics')
        ->with('users_count' , UserProfile::all()->count() )
        ->with('places_count' , Place::all()->count() )
        ->with('services_count' , Service::all()->count() )
        ->with('booking_count' , Booking::all()->count() )
        ->with('opinions_count' , Opinion::all()->count() )
        ->with('active_users_count', UserProfile::where('status','active')->count())
        ->with('dactive_users_count', UserProfile::where('status','dactive')->count())
        ->with('block_users_count', UserProfile::where('status','block')->count())
        ->with('available_places_count', Place::where('status','available')->count())
        ->with('unavailable_places_count', Place::where('status','unavailable')->count())
        ->with('out_of_service_places_count', Place::where('status','out_of_service')->count())
        ->with('available_services_count', Service::where('status','available')->count())
        ->with('unavailable_services_count', Service::where('status','unavailable')->count())
        ->with('pending_booking_count', Booking::where('status','pending')->count())
        ->with('canceled_booking_count', Booking::where('status','canceled')->count())
        ->with('confirmed_booking_count', Booking::where('status','confirmed')->count())
        ->with('out_of_date_booking_count', Booking::where('status','out_of_date')->count())
        ->with('complement_opinions_count', Opinion::where('type','complement')->count())
        ->with('complaint_opinions_count', Opinion::where('type','complaint')->count())
        ;
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
      //
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
