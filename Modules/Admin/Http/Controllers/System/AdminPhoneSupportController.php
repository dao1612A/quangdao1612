<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\System\PhoneSupport;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminController;

class AdminPhoneSupportController extends AdminController
{
    public function index()
    {
        $phones = PhoneSupport::orderBy('ps_sort','asc')->get();
        $viewData = [
            'phones' => $phones
        ];
        return view('admin::pages.phone_support.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.phone_support.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        PhoneSupport::create($data);
        $this->showMessagesSuccess("Thêm mới thành công");
        return redirect()->back();
    }

    public function edit($id)
    {
        $phone = PhoneSupport::find($id);
        return view('admin::pages.phone_support.update',compact('phone'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->except('_token');
        PhoneSupport::find($id)->update($data);
        $this->showMessagesSuccess("Cập nhật thành công");
        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $branch = PhoneSupport::findOrFail($id);
            if ($branch) $branch->delete();

            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }

}
