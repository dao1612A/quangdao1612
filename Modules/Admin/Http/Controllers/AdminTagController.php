<?php

namespace Modules\Admin\Http\Controllers;

use App\Models\Education\SeoEdutcation;
use App\Models\Education\Tag;
use App\Service\Seo\RenderUrlSeoCourseService;
use Carbon\Carbon;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminTagRequest;

class AdminTagController extends AdminController
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $tags = Tag::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'tags' => $tags
        ];

        return view('admin::pages.tag.index', $viewData);
    }

    public function create()
    {
        return view('admin::pages.tag.create');
    }

    public function store(AdminTagRequest $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();
        $data['t_position_1'] = 0;
        $data['t_position_2'] = 0;

        if(!$request->t_title_seo)             $data['t_title_seo'] = $request->t_name;
        if(!$request->t_description_seo) $data['t_description_seo'] = $request->t_name;
        if($request->t_position_1) $data['t_position_1'] = 1;
        if($request->t_position_2) $data['t_position_2'] = 1;

        $tagID = Tag::insertGetId($data);
        if($tagID)
        {
            $this->showMessagesSuccess();
            RenderUrlSeoCourseService::init($request->t_slug,SeoEdutcation::TYPE_TAG, $tagID);
            return redirect()->route('get_admin.tag.index');
        }
        $this->showMessagesError();
        return  redirect()->back();
    }

    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('admin::pages.tag.update', compact('tag'));
    }
    public function update(AdminTagRequest $request, $id)
    {
        $tag = Tag::findOrFail($id);
        $data = $request->except(['avatar','save','_token','t_position_1','t_position_2']);
        $data['updated_at'] = Carbon::now();

        if(!$request->t_title_seo)             $data['t_title_seo'] = $request->t_name;
        if(!$request->t_description_seo) $data['t_description_seo'] = $request->t_name;
        if($request->t_position_1) $data['t_position_1'] = 1;
        if($request->t_position_2) $data['t_position_2'] = 1;
        $tag->fill($data)->save();
        RenderUrlSeoCourseService::init($request->t_slug,SeoEdutcation::TYPE_TAG, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.tag.index');
    }

    public function delete( Request  $request, $id)
    {
        if($request->ajax())
        {
            $tag = Tag::find($id);
            if ($tag){
                $tag->delete();
                RenderUrlSeoCourseService::deleteUrlSeo(SeoEdutcation::TYPE_TAG, $id);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
