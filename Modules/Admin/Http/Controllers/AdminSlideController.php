<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\Tag;
use App\Models\System\Slide;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminSlideRequest;

class AdminSlideController extends AdminController
{
    public function index()
    {
        $slides = Slide::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'slides' => $slides
        ];

        return view('admin::pages.slide.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.slide.create');
    }

    public function store(AdminSlideRequest $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();


        $slideID = Slide::insertGetId($data);
        if($slideID)
        {
            $this->showMessagesSuccess();
            return redirect()->route('get_admin.slide.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin::pages.slide.update', compact('slide'));
    }

    public function update(AdminSlideRequest $request, $id)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['updated_at'] = Carbon::now();
        $slide = Slide::findOrFail($id);

        $slide->fill($data)->update();
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.slide.index');
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $slide = Slide::findOrFail($id);
            if ($slide)
            {
                $slide->delete();
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
