<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Blog\Menu;
use App\Models\Route;
use App\Models\User;
use App\Service\Seo\RenderMetaSeo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogMenuController extends Controller
{
    public function getArticleByMenu($id, $request)
    {
        $menu = Menu::find($id);
        if (!$menu) return abort(404);

        $articles = Article::where('a_menu_id', $id)
            ->select('id', 'a_name', 'a_slug', 'created_at', 'a_view', 'a_avatar', 'a_description', 'a_view', 'a_menu_id')
            ->paginate(20);

        $guests = User::where('is_guest', User::GUEST)->limit(8)->get();
        $routes = Route::orderByDesc('id')
            ->limit(8)->get();

        $detect = detectDevice();

        RenderMetaSeo::init([
            'title'       => $menu->m_title_seo,
            'description' => $menu->m_description_seo,
            'avatar'      => pare_url_file($menu->m_avatar)
        ]);

        $viewData = [
            'articles' => $articles,
            'menu'     => $menu,
            'detect'   => $detect,
            'guests'   => $guests,
            'routes'   => $routes
        ];

        return view('blog::menu.index', $viewData);
    }
}
