<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConfigEmail extends Model
{
    use HasFactory;

    protected $table = 'config_email';
    protected $guarded = [''];
}
