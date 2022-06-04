<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\BLog\SeoBlog;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BlogHubController extends Controller
{
    public function renderBlog(Request $request, $slug)
    {
        $slugMd5 = md5($slug);
        $urlSeo = SeoBlog::where('sb_md5', $slugMd5)->first();
        if($urlSeo) {
            $type = $urlSeo->sb_type;
            $id = $urlSeo->sb_id;
            switch ($type)
            {
                case SeoBlog::TYPE_KEYWORD:
                    return (new BlogKeywordController())->getArticleByKeyword($id, $request);

                case SeoBlog::TYPE_MENU:
                    return (new BlogMenuController())->getArticleByMenu($id, $request);

                case SeoBlog::TYPE_ARTICLE:
                    return (new BlogArticleController())->getArticleById($id, $request);

            }
        }

        return  redirect()->to('/');
    }
}
