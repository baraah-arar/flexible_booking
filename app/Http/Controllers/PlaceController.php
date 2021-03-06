<?php

namespace App\Http\Controllers;

use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\Service;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        {
            // $type = (substr(request()->fullurl(), strpos(request()->fullurl(), 'services/') + 9));
            if(strpos(request()->fullurl(), 'private')){
                $type = 'private';
                if(request('search') && request('search') === 'small'){
                    return view('components/services', 
                    ['places' => Place::where('plc_type', $type)
                        ->where('status', '!=', 'out_of_service')
                        ->whereBetween('capacity', [1,3])
                        ->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }if(request('search') && request('search') === 'medium'){
                    return view('components/services', 
                    ['places' => Place::where('plc_type', $type)
                        ->where('status', '!=', 'out_of_service')
                        ->whereBetween('capacity', [3,5])
                        ->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }
                if(request('search') && request('search') === 'large'){
                    return view('components/services', 
                    ['places' => Place::where('plc_type', $type)
                        ->where('status', '!=', 'out_of_service')
                        ->where('capacity', '>=', 5)
                        ->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }else{
                return view('components/services', 
                    ['places' => Place::where('plc_type', $type)->where('status', '!=', 'out_of_service')->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }
            }
            if(strpos(request()->fullurl(), 'meeting')){
                $type = 'meeting';
                if(request('search') && request('search') === 'small'){
                    return view('components/services', 
                    ['places' => Place::where('plc_type', $type)
                        ->where('status', '!=', 'out_of_service')
                        ->whereBetween('capacity', [1,25])
                        ->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }if(request('search') && request('search') === 'medium'){
                    return view('components/services', 
                    ['places' => Place::where('plc_type', $type)
                        ->where('status', '!=', 'out_of_service')
                        ->whereBetween('capacity', [26,50])
                        ->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }
                if(request('search') && request('search') === 'large'){
                    return view('components/services', 
                    ['places' => Place::where('plc_type', $type)
                        ->where('status', '!=', 'out_of_service')
                        ->where('capacity', '>=' , 51)
                        ->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }else{
                return view('components/services', 
                    ['places' => Place::where('plc_type', $type)->where('status', '!=', 'out_of_service')->get(),
                    'services' => Service::where('status', 'available')->get()]);
                }
            }else{
                return view('components/services', 
                    ['places' => Place::where('plc_type', 'individual')->where('status', '!=', 'out_of_service')->get(),
                    'services' => Service::where('status', 'available')->get()]);
            }
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        //
    }
}
