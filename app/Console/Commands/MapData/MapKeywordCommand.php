<?php

namespace App\Console\Commands\MapData;

use App\Models\Blog\Keyword;
use App\Models\BLog\SeoBlog;
use App\Service\Seo\RenderUrlSeoBLogService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MapKeywordCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:tag';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Map tag';

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
        $tagsMap = DB::connection('map')->table('tags')->get();
        foreach ($tagsMap as $item) {
            $this->info('[ID: ]' . $item->id);
            $data = [
                'id'                => $item->id,
                'k_name'            => $item->t_name,
                'k_slug'            => $item->t_slug,
                'k_title_seo'       => $item->t_name,
                'k_description_seo' => $item->t_description_seo,
                'created_at'        => $item->created_at
            ];
            $keyword = Keyword::create($data);
            RenderUrlSeoBLogService::init($keyword->k_slug, SeoBlog::TYPE_KEYWORD, $keyword->id);
        }
    }
}
