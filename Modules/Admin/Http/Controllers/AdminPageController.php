<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\System\Page;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminPageController extends AdminController
{
    public function index()
    {
        $pages = Page::orderByDesc('id')
            ->paginate(10);

        $viewData = [
            'pages' => $pages
        ];

        return view('admin::pages.page.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.page.create');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');
        $data['url'] = $this->replaceUrl($request->url);
        $data['created_at'] = Carbon::now();

        if(!$request->title_seo) $data['title_seo'] = $request->name;
        if(!$request->description_seo) $data['description_seo'] = $request->description;

        $id = Page::insertGetId($data);
        if($id) {
            $this->showMessagesSuccess();
            return  redirect()->route('get_admin.page.index');
        }
        $this->showMessagesError();
        return redirect()->back();
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin::pages.page.update', compact('page'));
    }

    public function update($id, Request $request)
    {
        $data = $request->except('_token','url');
        if(!$request->title_seo) $data['title_seo'] = $request->name;
        if(!$request->description_seo) $data['description_seo'] = $request->description;
        $page = Page::find($id);
        $page->fill($data)->save();
        $this->showMessagesSuccess();
        return redirect()->back();
    }

    protected function replaceUrl($url)
    {
        return parse_url($url)['path'] ?? '';
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $page = Page::findOrFail($id);
            if ($page) $page->delete();

            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
