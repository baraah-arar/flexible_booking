<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opinion extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','body','user_id'
    ];
    public function UserProfile()
    {
        return $this->belongsTo('App\Models\UserProfile','user_id');
    }
}
