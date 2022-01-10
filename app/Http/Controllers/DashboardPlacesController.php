<?php

namespace App\Http\Controllers;


use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardPlacesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $places = Place::latest()->get();
        return view('dashboard.places.places', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // $path=request()->file('image')->store('image');
        // return 'done:'.$path;
        $attributes = request()->validate([
            'title'=>'required|unique:places',
            'plc_type'=>'required',
            'status'=>'required',
            'capacity'=>'required',
            'price'=>'required',
            'description'=>'required|string',
            'image' => 'required|image'

        ]);
        $attributes['image'] = request()->file('image')->store('images/place');
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
        $attributes = request()->validate([
            'title'=>'required|unique:places,title,' . $place->id,
            'plc_type'=>'required',
            'status'=>'required',
            'capacity'=>'required',
            'price'=>'required',
            'description'=>'required|string',
            'image' => 'sometimes|nullable|image'

        ]);



       if ($request->hasFile('image')) {
        $place->image !== null ? Storage::delete($place->image) : '';
        $attributes['image'] = $request->file('image')->store('images/place');
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
        $place->delete();
        return redirect()->action([DashboardPlacesController::class, 'index']);

    }
}
