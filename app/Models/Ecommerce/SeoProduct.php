<?php

namespace App\Models\Ecommerce;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class SeoProduct extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'seo_products';

    const TYPE_CATEGORY = 2;
    const TYPE_PRODUCT  = 3;
    const TYPE_KEYWORD  = 1;

    protected $type = [
        self::TYPE_CATEGORY => [
            'name' => 'Category',
            'class' => 'default'
        ],
        self::TYPE_PRODUCT => [
            'name' => 'Product',
            'class' => 'success'
        ],
        self::TYPE_KEYWORD => [
            'name' => 'Keyword',
            'class' => 'info'
        ],
    ];

    public function getType()
    {
        return Arr::get($this->type, $this->sp_type, "[N\A]");
    }
}
