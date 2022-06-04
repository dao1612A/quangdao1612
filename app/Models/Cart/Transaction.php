<?php

namespace App\Models\Cart;

use App\Models\Car\BusesLocation;
use App\Models\Ecommerce\Product;
use App\Models\Location;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Modules\Guest\Entities\Buses;
use Modules\Guest\Entities\Vehicle;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'transactions';

    const STATUS_DEFAULT = 1;
    const STATUS_SUCCESS = 2;
    const STATUS_CANCEL  = -1;



    public static function statusGlobal()
    {
        return [
            self::STATUS_DEFAULT => [
                'name'  => 'Khởi tạo',
                'class' => 'secondary'
            ],
            self::STATUS_SUCCESS => [
                'name'  => 'Thành công',
                'class' => 'success'
            ],
            self::STATUS_CANCEL  => [
                'name'  => 'Huỷ bỏ',
                'class' => 'danger'
            ],
        ];
    }

    public $status = [
        self::STATUS_DEFAULT => [
            'name'  => 'Khởi tạo',
            'class' => 'secondary'
        ],
        self::STATUS_SUCCESS => [
            'name'  => 'Thành công',
            'class' => 'success'
        ],
        self::STATUS_CANCEL  => [
            'name'  => 'Huỷ bỏ',
            'class' => 'danger'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->t_status, "[N\A]");
    }

    public function user()
    {
        return $this->belongsTo(User::class, 't_user_id');
    }
}
