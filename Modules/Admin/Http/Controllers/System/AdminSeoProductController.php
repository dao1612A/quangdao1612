<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\Ecommerce\SeoProduct;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminSeoProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $seoProducts = SeoProduct::paginate(20);
        $viewData    = [
            'seoProducts' => $seoProducts
        ];
        return view('admin::pages.seo_product.index', $viewData);
    }
}
