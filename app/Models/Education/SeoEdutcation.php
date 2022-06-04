<?php

namespace App\Models\Education;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoEdutcation extends Model
{
    use HasFactory;

    protected $table = 'seo_education';
    protected $guarded = [''];

    const TYPE_CATEGORY = 1;
    const TYPE_TAG      = 2;
    const TYPE_COURSE   = 3;
    const TYPE_PRODUCT  = 4;
    const TYPE_KEYWORD = 5;
}
