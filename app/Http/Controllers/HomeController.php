<?php

namespace App\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Blog\Keyword;
use App\Models\Blog\Menu;
use App\Models\Doctor;
use App\Models\Ecommerce\Product;
use App\Models\Location;
use App\Models\Route;
use App\Models\User;
use App\Service\Content\RenderPageContent;
use App\Service\Seo\RenderMetaSeo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $doctors = Doctor::where('type', 2)
            ->orderByDesc('id')
            ->limit(10)
            ->get();

        $articles = Article::with('menu')->orderByDesc('id')
            ->limit(20)
            ->get();

        $viewData = [
            'doctors'  => $doctors,
            'articles' => $articles
        ];

        return view('pages.home.index', $viewData);
    }
}
