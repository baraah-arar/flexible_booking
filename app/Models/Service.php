<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','price','description','image','status'
    ];

    // public function booking()
    // {
    //     return $this->BelongsToMany('App\Models\booking', 'bkg_id');
    // }

    public function bookings()
    {
        return $this->BelongsToMany(Booking::class, BookingService::class ,'srv_id','bkg_id')->withPivot('status');
    }
}
