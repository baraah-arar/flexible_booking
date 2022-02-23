<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Place;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'plc_id','user_id','start_date','end_date','payment_plan','status','cost'
    ];

    public function scopeFilter($query){
        if(request('search') ?? false){ 
           $query->where('id', intval(request('search')));
        }
    }

    public function user()
    {
        return $this->belongsTo(UserProfile::class, 'user_id');
    }

    public function place()
    {
        return $this->belongsTo(Place::class, 'plc_id');
    }

    public function services()
    {
        return $this->BelongsToMany(Service::class, BookingService::class ,'bkg_id','srv_id')->withPivot('status');
    }

    public function assessment(){
        return $this->hasOne(Assessment::class, 'bkg_id');
    }
}

