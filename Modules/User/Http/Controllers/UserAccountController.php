<?php

namespace Modules\User\Http\Controllers;

use App\Models\User;
use App\Traits\MessageTrait;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class UserAccountController extends Controller
{
    use MessageTrait;
    public function index()
    {
        $user = User::find(get_data_user('users'));

        return view('user::dashboard.index', compact('user'));
    }

    public function updateInfo(Request $request)
    {
        try{
            $user          = User::find(get_data_user('users'));
            $user->name    = $request->name;
            $user->phone    = $request->phone;
            $user->address = $request->address;
            if ($request->password) $user->password = bcrypt($request->password);
            $user->save();
            $this->showMessagesSuccess("Cập nhật thành công");
        }catch (\Exception $exception)
        {
            Log::error("UserAccountController: ". $exception->getMessage());
            $this->showMessagesError("Cập nhật thất bại");
        }

        return redirect()->route('get_user.info');
    }

}
