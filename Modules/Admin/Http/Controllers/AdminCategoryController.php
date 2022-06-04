<?php

namespace Modules\Admin\Http\Controllers;

use App\Core\DetectCategory;
use App\Models\Category;
use App\Models\Ecommerce\SeoProduct;
use App\Models\Education\SeoEdutcation;
use App\Service\Category\CategoryService;
use App\Service\Seo\RenderUrlSeoCourseService;
use App\Service\Seo\RenderUrlSeoProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Requests\AdminCategoryRequest;

class AdminCategoryController extends AdminController
{
    public function index()
    {
        CategoryService::getInstance()->recursive(0, 1, $categories);

        $viewData = [
            'categories' => $categories
        ];
        return view('admin::pages.category.index', $viewData);
    }

    public function create()
    {
        CategoryService::getInstance()->recursive(0, 1, $categories);

        return view('admin::pages.category.create',compact('categories'));
    }

    public function store(AdminCategoryRequest  $request)
    {
        $data = $request->except(['avatar','save','_token']);
        $data['created_at'] = Carbon::now();

        $data['c_position'] = 0;
        if(!$request->c_title_seo)             $data['c_title_seo'] = $request->c_name;
        if(!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if($request->c_position) $data['c_position'] = 1;

        $category = Category::create($data);
        if($category)
        {
            $listChild = [
                $category->id
            ];
            if($category->c_parent_id )
            {
                $listChild = Category::where('c_parent_id', $category->c_parent_id)
                        ->pluck('id')->toArray() ?? [];
                array_push($listChild, $category->c_parent_id);
            }
            \DB::table('categories')->where('id', $category->c_parent_id)->update([
                'c_child_all' => json_encode($listChild)
            ]);
            $category->update([
                'c_child_all' => json_encode([$category->id])
            ]);
            $this->showMessagesSuccess();
            RenderUrlSeoProductService::init($request->c_slug,SeoProduct::TYPE_CATEGORY, $category->id);
            return redirect()->route('get_admin.category.index');
        }
        return  redirect()->back();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        CategoryService::getInstance()->recursive(0, 1, $categories);
        return view('admin::pages.category.update',compact('category','categories'));
    }

    public function update(AdminCategoryRequest $request, $id)
    {
        $category = Category::findOrFail($id);
        $data = $request->except(['avatar','save','_token','c_position_1']);
        $data['updated_at'] = Carbon::now();

        if(!$request->c_title_seo)             $data['c_title_seo'] = $request->c_name;
        if(!$request->c_description_seo) $data['c_description_seo'] = $request->c_name;
        if($request->c_position) $data['c_position'] = 1;

        $category->fill($data)->save();

        if($category->c_parent_id )
        {
            $listChild = Category::where('c_parent_id', $category->c_parent_id)
                    ->pluck('id')->toArray() ?? [];
            array_push($listChild, $category->c_parent_id );

            \DB::table('categories')->where('id', $category->c_parent_id)->update([
                'c_child_all' => json_encode($listChild)
            ]);
        }

        $category->update([
            'c_child_all' => json_encode([$category->id])
        ]);

        RenderUrlSeoProductService::init($request->c_slug,SeoProduct::TYPE_CATEGORY, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.category.index');
    }


    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $category = Category::find($id);
            if ($category)
            {
                $category->delete();
                RenderUrlSeoProductService::deleteUrlSeo(SeoProduct::TYPE_CATEGORY, $id);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
