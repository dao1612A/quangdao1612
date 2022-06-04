<?php

namespace Modules\User\Http\Controllers;

use App\Models\System\PayHistory;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserPayHistoryController extends Controller
{
    public function index()
    {
        $payHistories = PayHistory::where([
            'ph_user_id' => get_data_user('users')
        ])->orderByDesc('id')
            ->paginate(10);

        $viewData     = [
            'payHistories' => $payHistories
        ];

        return view('user::pay_history.index', $viewData);
    }
}
