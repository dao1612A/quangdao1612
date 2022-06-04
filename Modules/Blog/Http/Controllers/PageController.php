<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\System\Page;
use App\Service\Seo\RenderMetaSeo;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PageController extends Controller
{
    public function codeHireProject(Request $request)
    {
        $url = replace_url($request->url());
        if (!$url) return redirect()->to('/');

        $page = Page::where('url', $url)->first();
        if (!$page) return abort(404);

        RenderMetaSeo::init([
            'title'       => $page->title_seo,
            'description' => $page->description_seo,
            'avatar'      => pare_url_file($page->avatar),
            'robots'      => 'INDEX,FOLLOW'
        ]);

        $loadPageFace = true;

        return view('blog::pages.page_static', compact('page', 'loadPageFace'));
    }
}
