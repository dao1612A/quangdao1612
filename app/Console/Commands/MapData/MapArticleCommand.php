<?php

namespace App\Console\Commands\MapData;

use App\Models\Blog\Article;
use App\Models\BLog\SeoBlog;
use App\Service\Seo\RenderUrlSeoBLogService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MapArticleCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:article';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Map articles';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $articleMap = DB::connection('map')->table('articles')->get();
        foreach ($articleMap as $item) {
            $this->info('[ID: ]' . $item->id);
            $data    = [
                'id'                => $item->id,
                'a_name'            => $item->a_name,
                'a_slug'            => $item->a_slug,
                'a_description'     => $item->a_description,
                'a_menu_id'         => $item->a_menu_id,
                'a_content'         => $item->a_content,
                'a_auth_id'         => 1,
                'a_title_seo'       => $item->a_title_seo ? $item->a_title_seo : $item->a_name,
                'a_avatar'          => $item->a_avatar,
                'a_view'            => $item->a_view,
                'a_description_seo' => $item->a_description_seo ? $item->a_description_seo : $item->a_description,
                'created_at'        => $item->created_at
            ];
            $article = Article::create($data);
            RenderUrlSeoBLogService::init($article->a_slug, SeoBlog::TYPE_ARTICLE, $article->id);
        }
    }
}
