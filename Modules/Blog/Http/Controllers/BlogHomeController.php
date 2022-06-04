<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Blog\Article;
use App\Service\Content\RenderPageContent;
use App\Service\Seo\RenderMetaSeo;

class BlogHomeController extends BlogController
{
    public function index()
    {
        $viewData = [

        ];

        return view('blog::home.index', $viewData);
    }
}
