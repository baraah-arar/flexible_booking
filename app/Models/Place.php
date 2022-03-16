<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','plc_type','price','description','image','status','capacity',
    ];

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['status'] ?? false, fn($query, $filter) => 
            (strtolower($filter) == 'all') ? $query :
            $query->where('status', 'like', strtolower($filter))
        );

        $query->when($filters['type'] ?? false, fn($query, $filter) => 
            (strtolower($filter) == 'all') ? $query :
            $query->where('plc_type', 'like', strtolower($filter))
        );
    }

    public function getPath()
    {
        $url = 'uploads/'.$this->image;
        return $url;
    }

    public function bookings(){
        return $this->hasMany(Booking::class, 'plc_id');
    } 
}
