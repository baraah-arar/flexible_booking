<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id','bkg_id','value'
    ];
    public function UserProfile()
    {
        return $this->belongsTo('App\Models\UserProfile','user_id');
    }
    public function booking()
    {
        return $this->belongsTo('App\Models\booking','bkg_id');
    }



}
