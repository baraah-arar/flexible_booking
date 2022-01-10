<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserProfile extends Authenticatable
{
    protected $table = 'user_profiles';
    use HasFactory;
    protected $fillable = [
        'f_name','l_name','phone','email','password','role','status',
    ];

    // public function getUser_idAttribute($f_name){
    //     return ucwords($f_name);
    // }

    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }

    public function opinions()
    {
        return $this->hasMany('App\Models\Opinion', 'user_id');
    }

}
