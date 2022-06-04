<?php

namespace App\Models\Cart;

use App\Models\Car\BusesLocation;
use App\Models\Education\Course;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Guest\Entities\Buses;
use Modules\Guest\Entities\Vehicle;

class Order extends Model
{
    use HasFactory;

    const STATUS_DEFAULT = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_CANCEL = -1;

    protected $guarded = [''];
    protected $table = 'orders';

    public $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Khởi tạo',
            'class' => 'secondary'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Đã giao dịch',
            'class' => 'success'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Huỷ bỏ',
            'class' => 'danger'
        ],
    ];

    public function buses()
    {
        return $this->belongsTo(Buses::class,'o_action_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'o_user_id');
    }

    public function getStatus()
    {
        return Arr::get($this->status,$this->o_status, ['name' => '[N\A]','class' => 'default']);
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class,'o_vehicle_id');
    }

    public function buses_location_start()
    {
        return $this->belongsTo(BusesLocation::class,'o_buses_location_start');
    }

    public function buses_location_stop()
    {
        return $this->belongsTo(BusesLocation::class,'o_buses_location_stop');
    }

    public function starting()
    {
        return $this->belongsTo(Location::class,'o_starting_point_id');
    }

    public function destination()
    {
        return $this->belongsTo(Location::class,'o_destination_id');
    }


}
