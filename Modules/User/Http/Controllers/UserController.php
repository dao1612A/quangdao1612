<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function showMessagesSuccess($message = 'Thêm mới thành công')
    {
        return \Session::flash('toastr',[
            'type' => 'success',
            'message' => $message
        ]);
    }
    public function showMessagesError($message = 'Xử lý dữ liệu thất bại')
    {
        return \Session::flash('toastr',[
            'type' => 'error',
            'message' => $message
        ]);
    }
}
