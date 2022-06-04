<?php

namespace App\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Blog\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(Request $request, $slug, $id)
    {
        $menu = Menu::find($id);
        if (!$menu) return redirect()->to('/');

        $articles = Article::where('a_menu_id', $id)->orderByDesc('id')
        ->paginate(10);

        $menus = Menu::all();

        $viewData = [
            'articles' => $articles,
            'menus'    => $menus,
            'menu'    => $menu,
        ];

        return view('pages.menu.index', $viewData);
    }

    public function getLists(Request $request)
    {
        $articles = Article::orderByDesc('id')
            ->paginate(10);

        $menus = Menu::all();

        $viewData = [
            'articles' => $articles,
            'menus'    => $menus,
        ];

        return view('pages.menu.index', $viewData);
    }

    public function search(Request $request)
    {
        $articles = Article::where('a_name','like','%'.$request->k.'%')->orderByDesc('id')
        ->paginate(10);

        $menus = Menu::all();

        $viewData = [
            'articles' => $articles,
            'menus'    => $menus,
        ];

        return view('pages.menu.index', $viewData);
    }
}
