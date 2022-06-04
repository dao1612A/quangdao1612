<?php

namespace App\Models\System;

use App\Models\Category;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory, HasRoles;
    protected $guarded = [''];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }
}
