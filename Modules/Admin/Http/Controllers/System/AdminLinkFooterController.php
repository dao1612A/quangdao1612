<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\System\ConfigLink;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Http\Controllers\AdminController;

class AdminLinkFooterController extends AdminController
{
    public function index()
    {
        $links = ConfigLink::orderByDesc('id')->paginate(10);
        $viewData = [
            'links' => $links
        ];
        return view('admin::pages.config_link.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.config_link.create');
    }

    public function store(Request $request)
    {
        try{
            $data = $request->except('_token','title','link');
            $links = $request->link;
            $dataLinks = [];
            if (!empty($links))
            {
                $title = $request->title;
                foreach ($links as $key => $item)
                {
                    $dataLinks[] = [
                        'title' => $title[$key],
                        'url' => $item
                    ];
                }
            }
            $data['cl_list_link'] = json_encode($dataLinks);
            ConfigLink::create($data);
            $this->showMessagesSuccess("Thêm mới thành công");
        }catch (\Exception $exception)
        {
            $this->showMessagesError("Thêm mới thất bại");
            Log::error("[AdminLinkFooterController: ]". $exception->getMessage());
        }

        return redirect()->back();
    }

    public function edit($id)
    {
        $link = ConfigLink::find($id);
        $listsLink = json_decode($link->cl_list_link, true) ?? [];
        return view('admin::pages.config_link.create', compact('link','listsLink'));
    }

    public function update(Request $request, $id)
    {
        try{
            $data = $request->except('_token','title','link');
            $links = $request->link;
            $dataLinks = [];
            if (!empty($links))
            {
                $title = $request->title;
                foreach ($links as $key => $item)
                {
                    $dataLinks[] = [
                        'title' => $title[$key],
                        'url' => $item
                    ];
                }
            }
            $data['cl_list_link'] = json_encode($dataLinks);
            ConfigLink::find($id)->update($data);
            $this->showMessagesSuccess("Cập nhật thành công");
        }catch (\Exception $exception)
        {
            $this->showMessagesError("Cập nhật thất bại");
            Log::error("[AdminLinkFooterController: ]". $exception->getMessage());
        }

        return redirect()->back();
    }
    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $link = ConfigLink::findOrFail($id);
            if ($link) $link->delete();

            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
