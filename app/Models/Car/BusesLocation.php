<?php

namespace App\Models\Car;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusesLocation extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'buses_locations';

    const TYPE_DESTINATION = 2;
    const TYPE_STARTING    = 1;

    public function location()
    {
        return $this->belongsTo(Location::class,'bl_location_id');
    }
}
