<?php

namespace App\Models;

use App\Models\Education\Course;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    protected $table = 'favourites';
    protected $guarded = [''];

    public function course()
    {
        return $this->belongsTo(Course::class,'f_id');
    }
}
