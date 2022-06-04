<?php

namespace App\Models;

use App\Traits\FullTextSearch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory, FullTextSearch;
    protected $table = 'admins';
    protected $guarded = [''];

    protected $searchable = [
        'address',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
