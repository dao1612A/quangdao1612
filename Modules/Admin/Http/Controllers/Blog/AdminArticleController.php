<?php

namespace Modules\Admin\Http\Controllers\Blog;

use App\Models\Blog\Article;
use App\Models\Blog\ArticleKeyword;
use App\Models\Blog\Keyword;
use App\Models\Blog\Menu;
use App\Models\BLog\SeoBlog;
use App\Models\Category;
use App\Models\Education\Course;
use App\Models\Education\CourseContent;
use App\Models\Education\CourseTag;
use App\Models\Education\SeoEdutcation;
use App\Models\Education\Tag;
use App\Models\Education\Teacher;
use App\Service\Seo\RenderUrlSeoBLogService;
use App\Service\Seo\RenderUrlSeoCourseService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Controllers\AdminController;
use Modules\Admin\Http\Requests\AdminArticleRequest;
use Modules\Admin\Http\Requests\AdminCourseRequest;

class AdminArticleController extends AdminController
{
    public function index()
    {
        $articles = Article::orderByDesc('id')
            ->paginate(20);

        $viewData = [
            'articles' => $articles
        ];
        return view('admin::pages.blog.article.index', $viewData);
    }

    public function create()
    {
        $menus = Menu::all();
        $keywords = Keyword::all();
        $viewData = [
            'menus' => $menus,
            'keywordsOld' => [],
            'keywords' => $keywords,
        ];

        return view('admin::pages.blog.article.create', $viewData);
    }

    public function store(AdminArticleRequest $request)
    {
        $data = $request->except(['avatar', 'save', '_token', 'keywords']);
        $data['created_at'] = Carbon::now();

        if (!$request->a_title_seo) $data['a_title_seo'] = $request->a_name;
        if (!$request->a_description_seo) $data['a_description_seo'] = $request->a_name;

        $articleID = Article::insertGetId($data);
        if ($articleID) {
            $this->showMessagesSuccess();
            $this->syncKeywordsArticle($articleID, $request->keywords);
            RenderUrlSeoBLogService::init($request->a_slug,SeoBlog::TYPE_ARTICLE, $articleID);
            return redirect()->route('get_admin.article.index');
        }
        $this->showMessagesError();
        return redirect()->back();
    }

    protected function syncKeywordsArticle($articleID, $keywords)
    {
        if (!empty($keywords)) {
            \DB::table('articles_keywords')->where('ak_article_id', $articleID)->delete();
            foreach ($keywords as $item) {
                ArticleKeyword::insert([
                    'ak_article_id' => $articleID,
                    'ak_keyword_id' => $item
                ]);
            }
        }
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $menus = Menu::all();
        $keywords = Keyword::all();

        $keywordsOld = ArticleKeyword::where('ak_article_id', $id)
                ->pluck('ak_keyword_id')->toArray() ?? [];


        $viewData = [
            'article' => $article,
            'menus' => $menus,
            'keywords' => $keywords,
            'keywordsOld' => $keywordsOld
        ];
        return view('admin::pages.blog.article.update', $viewData);
    }

    public function update(AdminArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $data = $request->except(['avatar', 'save', '_token', 'keywords']);
        $data['created_at'] = Carbon::now();

        if (!$request->a_title_seo) $data['a_title_seo'] = $request->a_name;
        if (!$request->a_description_seo) $data['a_description_seo'] = $request->a_name;

        $article->fill($data)->save();
        $this->syncKeywordsArticle($id, $request->keywords);

        RenderUrlSeoBLogService::init($request->a_slug,SeoBlog::TYPE_ARTICLE, $id);
        $this->showMessagesSuccess();
        return redirect()->route('get_admin.article.index');
    }

    public function delete(Request $request, $id)
    {
        if ($request->ajax()) {
            $article = Article::findOrFail($id);
            if ($article) {
                $article->delete();
                RenderUrlSeoBLogService::deleteUrlSeo(SeoBlog::TYPE_ARTICLE, $id);
            }
            return response()->json([
                'status' => 200,
                'message' => 'Xoá dữ liệu thành công'
            ]);
        }

        return redirect()->to('/');
    }
}
