<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Ecommerce\Product;
use App\Service\Content\RenderPageContent;
use App\Service\Seo\RenderMetaSeo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SourceCodeController extends Controller
{
    public function index()
    {
        $products = Product::with('category:id,c_name', 'admin:id,name', 'keywords')
            ->orderByDesc('id')
            ->select('id', 'pro_name', 'pro_slug', 'pro_auth_id',
                'pro_avatar', 'pro_category_id', 'pro_price', 'pro_view', 'pro_pay')
            ->simplePaginate(10);

        $pageContent = RenderPageContent::getPage();

        if ($pageContent) {
            RenderMetaSeo::init([
                'title'       => $pageContent->title_seo,
                'description' => $pageContent->description_seo,
                'avatar'      => pare_url_file($pageContent->avatar),
                'robots'      => $pageContent->seo
            ]);
        }

        $viewData = [
            'products'    => $products ?? [],
            'pageContent' => $pageContent
        ];

        return view('blog::pages.project.index', $viewData);
    }
}
