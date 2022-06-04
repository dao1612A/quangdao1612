<?php

namespace App\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Blog\Menu;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request, $slug, $id)
    {
        $article = Article::find($id);

        $articles = Article::with('menu')->orderByDesc('id')
            ->limit(5)
            ->get();

        $menus = Menu::all();

        $viewData = [
            'article'  => $article,
            'articles' => $articles,
            'menus'    => $menus
        ];

        return view('pages.article.index', $viewData);
    }
}
