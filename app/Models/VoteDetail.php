<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VoteDetail extends Model
{
    use HasFactory;

    protected $table = 'votes_detail';
    protected $guarded = [''];

    const TYPE_UTILITIES = 1;
    const TYPE_INFO      = 2;
    const TYPE_SAFE      = 3;
    const TYPE_QUALITY   = 4;
    const TYPE_ATTITUDE  = 5;

    public $type = [
        self::TYPE_UTILITIES => [
            'name'      => 'Tiện ích',
            'attribute' => 'vote_utilities'
        ],
        self::TYPE_INFO      => [
            'name'      => 'Thông tin',
            'attribute' => 'vote_info'
        ],
        self::TYPE_SAFE      => [
            'name'      => 'An toàn',
            'attribute' => 'vote_safe'
        ],
        self::TYPE_QUALITY   => [
            'name'      => 'Chất lượng',
            'attribute' => 'vote_quality'
        ],
        self::TYPE_ATTITUDE  => [
            'name'      => 'Thái độ',
            'attribute' => 'vote_attitude'
        ],
    ];

    public function getType()
    {
        return $this->type;
    }
}
