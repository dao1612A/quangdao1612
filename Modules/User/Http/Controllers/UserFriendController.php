<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserFriendController extends Controller
{
    public function index()
    {
        $friends  = User::where('presenter_id', get_data_user('users'))
            ->orderByDesc('id')
            ->paginate(10);
        $viewData = [
            'friends' => $friends
        ];

        return view('user::friend.index', $viewData);
    }
}
