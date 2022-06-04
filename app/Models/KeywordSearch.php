<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeywordSearch extends Model
{
    use HasFactory;

    protected $table = 'keywords_search';
    protected $guarded = [''];
}
