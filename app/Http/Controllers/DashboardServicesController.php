<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class DashboardServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::latest()->get();
        return view('dashboard.services.services', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'name'=>'required|unique:services',
            'status'=>'required',
            'price'=>'required',
            'description'=>'required|string',
            'image' => 'required|image'

        ]);
        $attributes['image'] = request()->file('image')->store('images/service');
        Service::create($attributes);
        return redirect()->route('dashboard.services_index')
        ->with('success','service added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('dashboard.services.show',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('dashboard.services.edit',compact('service'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //ddd($request->all());
        $attributes = request()->validate([
            'name'=>'required|unique:services,name,'. $service->id,
            'status'=>'required',
            'price'=>'required',
            'description'=>'required|string',
            'image' => 'sometimes|nullable|image'

        ]);



       if ($request->hasFile('image')) {
        $service->image !== null ? Storage::delete($service->image) : '';
        $attributes['image'] = $request->file('image')->store('images/service');
       }
       $service->update($attributes);
        return redirect()->route('dashboard.services_index')
        ->with('success','Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->action([DashboardServicesController::class, 'index']);
    }
}
