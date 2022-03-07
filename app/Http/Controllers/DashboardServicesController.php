<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;


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
        $this->authorize('create', Service::class);
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
        $this->authorize('create', Service::class);
        $attributes = request()->validate([
            'name'=>'required|unique:services',
            'status'=>'required',
            'price'=>'required|gt:-1',
            'description'=>'required|string',
            'image' => 'nullable|image'

        ]);
        // $attributes['image'] = request()->file('image')->store('images/service');
        $attributes['image'] = cloudinary()->upload(request()->file('image')->getRealPath(), [
            'folder' => 'service'
        ])->getSecurePath();
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
        $this->authorize('update', $service);
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
        $this->authorize('update', $service);
        $attributes = request()->validate([
            'name'=>'required|unique:services,name,'. $service->id,
            'status'=>'required',
            'price'=>'required|gt:-1',
            'description'=>'required|string',
            'image' => 'sometimes|nullable|image'

        ]);



    //    if ($request->hasFile('image')) {
    //     $service->image !== null ? Storage::delete($service->image) : '';
    //     $attributes['image'] = $request->file('image')->store('images/service');
    //    }
        // store on cloudinary
        if ($request->hasFile('image')) {
            if($service->image !== null){
                $temp = explode('/',$service->image);
                $temp = str_replace(".png","", $temp[sizeof($temp)-1]);
                cloudinary()->destroy($temp);
            }
            $attributes['image'] = Cloudinary::upload(request()->file('image')->getRealPath(), [
            'folder' => 'service'
            ])->getSecurePath();
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
        $this->authorize('delete', $service);
        $service->delete();
        return redirect()->action([DashboardServicesController::class, 'index']);
    }
}
