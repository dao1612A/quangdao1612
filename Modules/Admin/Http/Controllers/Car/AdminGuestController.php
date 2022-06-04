<?php

namespace Modules\Admin\Http\Controllers\Car;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminGuestController extends Controller
{
    public function index()
    {
        $users = User::where('is_guest', User::GUEST)
        ->orderByDesc('id')->paginate(20);
        $viewData = [
            'users' => $users
        ];
        return view('admin::pages.guest.index', $viewData);
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $user =  User::find($id);
            if ($user) $user->delete();
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }
        return redirect()->to('/');
    }
}
