<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Models\Blog\Keyword;
use App\Models\Category;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\ProductKeyword;
use App\Models\Ecommerce\SeoProduct;
use App\Models\Education\SeoEdutcation;
use App\Service\Category\CategoryService;
use App\Service\Seo\RenderUrlSeoCourseService;
use App\Service\Seo\RenderUrlSeoProductService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Modules\Admin\Http\Controllers\AdminController;

class AdminProductController extends AdminController
{
    public function index()
    {
        $products = Product::with('category:c_name,c_slug,id')->orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'products' => $products
        ];
        return view('admin::pages.ecommerce.product.index', $viewData);
    }

    public function create()
    {
        $keywords   = Keyword::all();
        CategoryService::getInstance()->recursive(0, 1, $categories);
        $viewData   = [
            'keywords'    => $keywords,
            'categories'  => $categories,
            'keywordsOld' => []
        ];
        return view('admin::pages.ecommerce.product.create', $viewData);
    }

    public function store(Request $request)
    {
        $data    = $request->except(['keywords', 'avatar', '_token']);
        $data['created_at'] = Carbon::now();
        $product = Product::create($data);
        if ($keywords = $request->keywords)
            $this->syncProduct($keywords, $product->id);

        RenderUrlSeoProductService::init($product->pro_slug, SeoProduct::TYPE_PRODUCT, $product->id);
        $this->showMessagesSuccess('Cập nhật thành công');
        return redirect()->back();
    }

    public function edit($id)
    {
        $product    = Product::find($id);
        $keywords   = Keyword::all();
        CategoryService::getInstance()->recursive(0, 1, $categories);

        $keywordsOld = ProductKeyword::where('pk_product_id', $id)
                ->pluck('pk_keyword_id')->toArray() ?? [];
        $viewData    = [
            'keywords'    => $keywords,
            'product'     => $product,
            'categories'  => $categories,
            'keywordsOld' => $keywordsOld
        ];

        return view('admin::pages.ecommerce.product.update', $viewData);
    }

    public function update(Request $request, $id)
    {
        $data    = $request->except(['keywords', 'avatar', '_token']);
        $product = Product::find($id);
        $product->fill($data)->save();
        if ($keywords = $request->keywords)
            $this->syncProduct($keywords, $id);

        RenderUrlSeoProductService::init($product->pro_slug, SeoProduct::TYPE_PRODUCT, $product->id);
        $this->showMessagesSuccess('Cập nhật thành công');
        return redirect()->back();
    }

    protected function syncProduct($keywords, $productID)
    {
        $data = [];
        foreach ($keywords as $keyword) {
            $data[] = [
                'pk_product_id' => $productID,
                'pk_keyword_id' => $keyword
            ];
        }

        if ($data) {
            \DB::table('products_keywords')->where('pk_product_id', $productID)->delete();
            \DB::table('products_keywords')->insert($data);
        }
    }

    public function delete(Request $request, $id)
    {
        if($request->ajax())
        {
            $product = Product::find($id);
            if ($product)
            {
                $product->delete();
                RenderUrlSeoProductService::deleteUrlSeo(SeoProduct::TYPE_PRODUCT, $id);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
