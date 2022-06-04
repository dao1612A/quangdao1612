<?php

namespace App\Models\BLog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoBlog extends Model
{
    protected $table = 'seo_blog';
    protected $guarded = [''];

    const TYPE_KEYWORD = 1;
    const TYPE_MENU = 2;
    const TYPE_ARTICLE = 3;
}
