<?php

namespace Modules\User\Http\Controllers;

use App\Models\Cart\Transaction;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user::dashboard.index');
    }
}
