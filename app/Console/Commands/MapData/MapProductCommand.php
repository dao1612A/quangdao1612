<?php

namespace App\Console\Commands\MapData;

use App\Models\Ecommerce\Product;
use App\Models\Education\SeoEdutcation;
use App\Service\Seo\RenderUrlSeoCourseService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class MapProductCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'map:product';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Map Product';

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
        $productsMap = DB::connection('map')->table('products')->get();
        foreach ($productsMap as $item) {
            $this->info('[ID: ]' . $item->id);
            $data    = [
                'id'                  => $item->id,
                'pro_name'            => $item->pro_name,
                'pro_slug'            => $item->pro_slug,
                'pro_price'           => $item->pro_price,
                'pro_category_id'     => $item->pro_category_id,
                'pro_avatar'          => $item->pro_avatar,
                'pro_view'            => $item->pro_view,
                'pro_description'     => $item->pro_description,
                'pro_content'         => $item->pro_content,
                'pro_description_seo' => $item->pro_description_seo ? $item->pro_description_seo : $item->pro_description,
                'pro_keyword_seo'     => $item->pro_keyword_seo,
                'pro_title_seo'       => $item->pro_title_seo ? $item->pro_title_seo : $item->pro_name,
                'created_at'          => $item->created_at
            ];
            $product = Product::create($data);
            RenderUrlSeoCourseService::init($product->pro_slug, SeoEdutcation::TYPE_PRODUCT, $product->id);
        }
    }
}
