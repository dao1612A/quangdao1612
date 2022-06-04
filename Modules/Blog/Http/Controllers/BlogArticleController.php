<?php

namespace Modules\Blog\Http\Controllers;

use App\Models\Blog\Article;
use App\Models\Route;
use App\Models\User;
use App\Service\ProcessViewService;
use App\Service\Seo\RenderMetaSeo;
use Illuminate\Routing\Controller;

class BlogArticleController extends Controller
{
    public function getArticleById($id, $request)
    {
        $article = Article::with('menu:id,m_name,m_slug')
            ->select('a_name','a_slug','a_avatar','a_description','created_at')
            ->find($id);
        if (!$article) return about(404);

        $articlesRelate = Article::where('a_menu_id', $article->a_menu_id)
            ->select('id', 'a_name', 'a_slug', 'a_avatar', 'a_description', 'a_menu_id')
            ->orderByDesc('id')
            ->get(10);

        //2. Xử lý view
        ProcessViewService::view('articles', 'a_view', 'article_', $id);

        $content = $this->replaceImage($article->a_content);

        RenderMetaSeo::init([
            'title'       => $article->a_title_seo,
            'description' => $article->a_description_seo,
            'avatar'      => pare_url_file($article->a_avatar),
            'robots'      => 'INDEX,FOLLOW'
        ]);

        $guests    = User::where('is_guest',User::GUEST)
            ->select('id','name','slug')
            ->limit(8)->get();

        $routes = Route::orderByDesc('id')
            ->select('name','id','slug')
            ->limit(8)->get();

        $viewData = [
            'articlesRelate' => $articlesRelate,
            'article'        => $article,
            'guests'         => $guests,
            'routes'         => $routes,
            'content'        => $content
        ];

        return view('blog::article.index', $viewData);
    }

    protected function replaceImage($content)
    {
        $data = html_entity_decode($content);
        $doc  = new \DOMDocument();
        libxml_use_internal_errors(true);
        $doc->loadHTML('<?xml encoding="utf-8" ?>' . $data);
        $tags = $doc->getElementsByTagName('img');

        foreach ($tags as $tag) {
            $old_src     = $tag->getAttribute('src');
            $new_src_url = '/images/default.png';
            $tag->setAttribute('src', $new_src_url);
            $tag->setAttribute('data-src', $old_src);
            $tag->setAttribute('class', 'lazy');
        }
        $data = $doc->saveHTML();
        return $data;
    }
}
