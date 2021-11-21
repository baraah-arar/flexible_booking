<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = [
        'plc_id','user_id','start_date','end_date'
    ];
    public function UserProfile()
    {
        return $this->belongsTo('App\Models\UserProfile','user_id');
    }
    public function place()
    {
        return $this->belongsTo('App\Models\place','plc_id');
    }


    public function service()
    {
        return $this->BelongsToMany('App\Models\service');
    }
}

