<?php

namespace App\Models\System;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branch';
    protected $guarded = [''];

    public function city()
    {
        return $this->belongsTo(Location::class,'b_location_city_id','id');
    }
}
