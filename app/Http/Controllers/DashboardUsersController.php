<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\UserProfile;

class DashboardUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = UserProfile::latest()->paginate(15);
        return view('dashboard.users.users', compact('users'));

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ddd($request->all());
        $attributes = request()->validate([
         'f_name'=>'required|max:255',
         'l_name'=>'required|max:255',
         'phone'=>'required|min:9|max:20|unique:user_profiles,phone',
         'email'=>'required|email|max:255|unique:user_profiles,email',
         'password'=>'required|min:8|max:255',
         'role'=>'required',
         'status'=>'required',
        ]);

        UserProfile::create($attributes);
        return redirect()->route('dashboard.users')
        ->with('success','User added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Userprofile $user)
    {
      //ddd($user->all());
         return view('dashboard.users.show',compact('user'));

    }
    public function author($id)
    {

        $user = UserProfile::with('opinions')->find($id);
    //     if ($user.lenght()==0) abort(404);
    //    else
        return view('dashboard.opinions.user_opinions', ['opinions' => $user->opinions]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Userprofile $user)
    {
        return view('dashboard.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Userprofile $user)
    {
           $attributes = request()->validate([
            'f_name'=>'required|max:255',
            'l_name'=>'required|max:255',
            'phone'=>'required|min:9|max:20',
            'email'=>'required|email|max:255',
            'password'=>'required|min:8|max:255',
            'role'=>'required',
            'status'=>'required',

        ]);

       $user->update($attributes);
        return redirect()->route('dashboard.users')
        ->with('success','User updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Userprofile $user)
    {
        $user->delete();
        return redirect()->action([DashboardUsersController::class, 'index']);

    }

}
