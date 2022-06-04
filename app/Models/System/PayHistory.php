<?php

namespace App\Models\System;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayHistory extends Model
{
    use HasFactory;

    protected $guarded = [''];
    protected $table = 'pay_histories';

    const TYPE_REGISTER         = 1;
    const TYPE_TICKET_AFFILIATE = 2;
    const TYPE_TICKET_SUCCESS   = 3;
}
