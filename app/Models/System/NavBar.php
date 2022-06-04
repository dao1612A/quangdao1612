<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class NavBar extends Model
{
    use HasFactory;

    protected $table = 'navbars';
    protected $guarded = [''];

    const TYPE_URL      = 1;
    const TYPE_MENU     = 2;
    const TYPE_ARTICLE  = 3;
    const TYPE_CATEGORY = 4;
    const TYPE_PRODUCT  = 5;
    const TYPE_KEYWORD  = 6;

    public $type = [
        self::TYPE_URL      => [
            'name' => 'URL'
        ],
//        self::TYPE_MENU     => [
//            'name' => 'Menu Bài viết'
//        ],
//        self::TYPE_ARTICLE  => [
//            'name' => 'Bài viết'
//        ],
        self::TYPE_CATEGORY  => [
            'name' => 'Danh mục'
        ],
        self::TYPE_PRODUCT  => [
            'name' => 'Sản phẩm'
        ],
        self::TYPE_KEYWORD  => [
            'name' => 'Từ khoá'
        ],
    ];

    public function getType()
    {
        return Arr::get($this->type, $this->nb_type, []);
    }

    public function parent()
    {
        return $this->belongsTo(self::class,'nb_parent_id','id');
    }

    public function child()
    {
        return $this->hasMany(self::class,'nb_parent_id');
    }
}
