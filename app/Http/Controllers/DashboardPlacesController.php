<?php

namespace App\Http\Controllers;


use App\Models\Place;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BookingService;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class DashboardPlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->filter(request(['status','type']))->get();
        return view('dashboard.places.places', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Place::class); 
        return view('dashboard.places.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Place::class);
        // $path=request()->file('image')->store('image');
        // return 'done:'.$path;
        $attributes = request()->validate([
            'title'=>'required|unique:places',
            'plc_type'=>'required',
            'status'=>'required',
            'capacity'=>'required|gt:0',
            'price'=>'required|gt:-1',
            'description'=>'required|string',
            'image' => 'nullable|image'

        ]);
        // $attributes['image'] = request()->file('image')->store('images/place');
        if ($request->hasFile('image')){
            $attributes['image'] = cloudinary()->upload(request()->file('image')->getRealPath(), [
                'folder' => 'place'
            ])->getSecurePath();
        };
        Place::create($attributes);
        return redirect()->route('dashboard.places_index')
        ->with('success','User added successfully');
        // $request->file->;


        // dd($request->file('image'));
        // return Place::create($request->validated())
        // ? redirect()->route('dashboard.places_index')->with('success','Place added successfully')
        // : redirect()->back()->with('failed','something want worng!');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        return view('dashboard.places.show',compact('place'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
        $this->authorize('update', $place);
        return view('dashboard.places.edit',compact('place'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        $this->authorize('update', $place);
        $attributes = request()->validate([
            'title'=>'required|unique:places,title,' . $place->id,
            'plc_type'=>'required',
            'status'=>'required',
            'capacity'=>'required|gt:0',
            'price'=>'required|gt:-1',
            'description'=>'required|string',
            'image' => 'sometimes|nullable|image'

        ]);
        // storage
    //    if ($request->hasFile('image')) {
    //     $place->image !== null ? Storage::delete($place->image) : '';
    //     $attributes['image'] = $request->file('image')->store('images/place');
    //    }
        // store on cloudinary
        if ($request->hasFile('image')) {
            if($place->image !== null){
                $temp = explode('/',$place->image);
                $temp = str_replace(".png","", $temp[sizeof($temp)-1]);
                cloudinary()->destroy($temp);
            }
            $attributes['image'] = cloudinary()->upload(request()->file('image')->getRealPath(), [
            'folder' => 'place'
            ])->getSecurePath();
        }
       $place->update($attributes);
        return redirect()->route('dashboard.places_index')
        ->with('success','Place updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {
        $this->authorize('delete', $place);
        if($place->bookings->count() <= 0){
            $place->delete();
            return response()->json([
                "status" => true,
                "data" => $place->bookings
            ]);
        }else{
            foreach($place->bookings as $booking){
                if($booking->status == 'confirmed'){
                    return response()->json([
                        "status" => 'failed',
                        "data" => $place->bookings
                    ]);
                }
            }
            foreach($place->bookings as $booking){
                if($booking->status == 'pending'){
                    Booking::where('id', $booking->id)->update(['status' => 'canceled']);
                    $services = Booking::where('id', $booking->id)->first()->services;
                    foreach($services as $service){
                        BookingService::where('srv_id', $service->id)
                            ->where('bkg_id', $booking->id)->update(['status' => 'canceled']);
                    };
                }
            }
            Place::where('id', $place->id)->update(['status' => 'out_of_service']);
            return response()->json([
                "status" => 'updated',
                "data" => $place->bookings
            ]);
        }
        // 
        // return redirect()->action([DashboardPlacesController::class, 'index']);

    }
}
