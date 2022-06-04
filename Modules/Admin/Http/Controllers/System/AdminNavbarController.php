<?php

namespace Modules\Admin\Http\Controllers\System;

use App\Models\Blog\Article;
use App\Models\Blog\Keyword;
use App\Models\Blog\Menu;
use App\Models\Category;
use App\Models\Ecommerce\Product;
use App\Models\System\NavBar;
use App\Service\Navbars\NavBarsService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Http\Controllers\AdminController;

class AdminNavbarController extends AdminController
{
    public function index()
    {
        NavBarsService::getInstance()->recursive(0, 1, $navbars);
        $viewData = [
            'navbars' => $navbars
        ];
        return view('admin::pages.navbar.index', $viewData);
    }

    public function create()
    {
        $type = (new NavBar())->getType();
        NavBarsService::getInstance()->recursive(0, 1, $navbars);
        $viewData = [
            'type'    => $type,
            'navbars' => $navbars
        ];
        return view('admin::pages.navbar.create', $viewData);
    }

    public function getType(Request $request, $type)
    {
        if ($request->ajax()) {
            Log::info($type);
            switch ($type) {
                case NavBar::TYPE_URL:
                    $html = view('admin::pages.navbar.include.inc_url')->render();
                    break;

//                case NavBar::TYPE_MENU:
//                    $menus = Menu::all();
//                    $html  = view('admin::pages.navbar.include.inc_menu', compact('menus'))->render();
//                    break;
//
//                case NavBar::TYPE_ARTICLE:
//                    $articles = Article::all();
//                    $html     = view('admin::pages.navbar.include.inc_article', compact('articles'))->render();
//                    break;

                case NavBar::TYPE_CATEGORY:
                    $categories = Category::all();
                    $html       = view('admin::pages.navbar.include.inc_category', compact('categories'))->render();
                    break;

                case NavBar::TYPE_PRODUCT:
                    $products = Product::all();
                    $html     = view('admin::pages.navbar.include.inc_product', compact('products'))->render();
                    break;
                case NavBar::TYPE_KEYWORD:
                    $keywords = Keyword::all();
                    $html     = view('admin::pages.navbar.include.inc_keyword', compact('keywords'))->render();
                    break;
            }

            return response()->json($html);
        }
    }

    public function store(Request $request)
    {
        try {
            $data               = $request->except('_token');
            $data['created_at'] = Carbon::now();
            $navBar             = NavBar::create($data);
            if ($navBar) {
                $this->renderURL($navBar);
                $parent        = $request->nb_parent_id;
                $nav           = NavBar::find($parent);
                if($nav) {
                    $nav->is_child = 1;
                    $nav->save();
                }
            }
            $this->showMessagesSuccess('Thêm dữ liệu thành công');
        } catch (\Exception $exception) {
            Log::error("[]" . $exception->getMessage());
            $this->showMessagesError("Thêm dữ liệu thất bại");
        }

        return redirect()->back();
    }

    public function renderURL($navBar)
    {
        $type = $navBar->nb_type;
        $url  = $navBar->nb_url;
        switch ($type) {
            case NavBar::TYPE_MENU:
                $menu = Menu::find($navBar->nb_id);
                $url  = route('get_blog.render', ['slug' => $menu->m_slug . '-m']);
                break;

            case NavBar::TYPE_ARTICLE:
                $article = Article::find($navBar->nb_id);
                $url     = route('get_blog.render', ['slug' => $article->a_slug . '-a']);
                break;

            case NavBar::TYPE_CATEGORY:
                $category = Category::find($navBar->nb_id);
                $url      = route('get_document.render', ['slug' => $category->c_slug . '-c']);
                break;

            case NavBar::TYPE_PRODUCT:
                $product = Product::find($navBar->nb_id);
                $url     = route('get_document.render', ['slug' => $product->pro_slug . '-pro']);
                break;

            case NavBar::TYPE_KEYWORD:
                $keyword = Keyword::find($navBar->nb_id);
                $url     = route('get_document.render', ['slug' => $keyword->k_slug . '-k']);
                break;
        }
        $navBar->nb_url = $url;
        $navBar->save();
    }

    public function edit($id)
    {
        $navBar = NavBar::find($id);
        $type   = (new NavBar())->getType();
        NavBarsService::getInstance()->recursive(0, 1, $navbars);
        $viewData = [
            'type'    => $type,
            'navBar'  => $navBar,
            'navbars' => $navbars
        ];

        return view('admin::pages.navbar.update', $viewData);
    }

    public function update($id, Request $request)
    {
        $navBar             = NavBar::find($id);
        $data               = $request->except('_token');
        $data['created_at'] = Carbon::now();
        $navBar->fill($data)->save();
        if ($navBar) {
            $this->renderURL($navBar);
            $parent        = $request->nb_parent_id;
            $nav           = NavBar::find($parent);
            if($nav) {
                $nav->is_child = 1;
                $nav->save();
            }
        }
        $this->showMessagesSuccess('Thêm dữ liệu thành công');

        return redirect()->back();
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $nav = NavBar::findOrFail($id);
            if ($nav) {
                $navParent = NavBar::where('nb_parent_id', $nav->nb_parent_id)->first();
                if ($navParent) {
                    $navItemParent           = NavBar::find($nav->nb_parent_id);
                    if($navItemParent)
                    {
                        $navItemParent->is_child = 0;
                        $navItemParent->save();
                    }
                }

                $nav->delete();
            }


            return response()->json([
                'status'  => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
