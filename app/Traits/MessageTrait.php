<?php


namespace App\Traits;


trait MessageTrait
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