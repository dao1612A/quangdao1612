<?php

namespace App\Console\Commands\MapData;

use App\Models\Blog\Menu;
use App\Models\BLog\SeoBlog;
use App\Service\Seo\RenderUrlSeoBLogService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MapMenuCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:menu';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Map menu';

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
        $menusMap = DB::connection('map')->table('menus')->get();
        foreach ($menusMap as $item) {
            $this->info('[ID: ]' . $item->id);
            $data = [
                'id'                => $item->id,
                'm_name'            => $item->mn_name,
                'm_slug'            => $item->mn_slug,
                'm_description_seo' => $item->mn_description_seo,
                'created_at'        => $item->created_at
            ];
            $menu = Menu::create($data);
            RenderUrlSeoBLogService::init($menu->m_slug, SeoBlog::TYPE_MENU, $menu->id);
        }
    }
}
