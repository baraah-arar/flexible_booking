<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;


    protected $fillable = [
        'title','body','user_id','type',
    ];

    public function scopeFilter($query, array $filters){
        $query->when($filters['type'] ?? false, fn($query, $filter)=> 
            $query->where('type', $filter)
    );
    }

    public function author()
    {
        return $this->belongsTo('App\Models\UserProfile','user_id');
    }

}
