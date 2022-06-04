<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class PromotionCode extends Model
{
    use HasFactory;
    protected $table = 'promotion_code';
    protected $guarded = [''];

    const STATUS_DEFAULT = 0;
    const STATUS_SUCCESS = 1;
    const STATUS_CANCEL = -1;

    public $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Khởi tạo',
            'class' => 'secondary'
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Đã sử dụng',
            'class' => 'success'
        ],
        self::STATUS_CANCEL => [
            'name' => 'Huỷ bỏ',
            'class' => 'danger'
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status,$this->pc_status, ['name' => '[N\A]','class' => 'default']);
    }
}
