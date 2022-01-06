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

    public function getPath()
    {
        $url = 'uploads/'.$this->image;
        return $url;
    }
}
