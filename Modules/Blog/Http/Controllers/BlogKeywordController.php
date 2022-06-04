<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogKeywordController extends Controller
{
    public function getArticleByKeyword($id, $request)
    {
        return view('blog::pages.keyword.index');
    }
}
