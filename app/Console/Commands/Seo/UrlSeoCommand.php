<?php

namespace App\Console\Commands\Seo;

use App\Models\Blog\Keyword;
use App\Models\Category;
use App\Models\Ecommerce\Product;
use App\Models\Ecommerce\SeoProduct;
use App\Service\Seo\RenderUrlSeoProductService;
use Illuminate\Console\Command;

class UrlSeoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seo:render-url';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seo Render URL';

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
        $keywords = Keyword::all();
        $categories = Category::all();
        $products = Product::all();
        \DB::table('seo_products')->truncate();
        foreach ($keywords as $keyword)
        {
            RenderUrlSeoProductService::init($keyword->k_slug,SeoProduct::TYPE_KEYWORD, $keyword->id);
        }

        foreach ($categories as $category)
        {
            RenderUrlSeoProductService::init($category->c_slug,SeoProduct::TYPE_CATEGORY, $category->id);
        }

        foreach ($products as $product)
        {
            RenderUrlSeoProductService::init($product->pro_slug,SeoProduct::TYPE_PRODUCT, $product->id);
        }
    }
}
