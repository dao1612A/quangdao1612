<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AdminUserRequest;

class AdminUserController extends AdminController
{
    public function index()
    {
        $users = User::orderByDesc('id')->paginate(20);
        $viewData = [
            'users' => $users
        ];
        return view('admin::pages.user.index', $viewData);
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

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin::pages.user.update', compact('user'));
    }

    public function update($id, AdminUserRequest $request)
    {
        try{
            $data = $request->except('_token','password');
            if ($request->password) $data['password'] = bcrypt($request->password);
            User::find($id)->update($data);
            $this->showMessagesSuccess("Cập nhật thành công");
        }catch (\Exception $exception)
        {
            $this->showMessagesError("Cập nhật thất bại");
        }

        return redirect()->back();
    }
}
