<?php

namespace App\Providers;

use App\Models\Blog\Menu;
use App\Models\Category;
use App\Models\Configuration;
use App\Models\System\ConfigLink;
use App\Models\System\NavBar;
use App\Models\System\PhoneSupport;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        try {
            if ($this->app->environment() != 'local') URL::forceScheme('https');
            $menuBlog         = Menu::orderBy('m_sort', 'asc')->get();
            $configuration    = Configuration::first();
            $navBars          = NavBar::with('child')
                ->where([
                    'nb_status'    => 1,
                    'nb_parent_id' => 0
                ])
                ->orderBy('nb_sort', 'asc')
                ->select('id', 'nb_url', 'nb_name', 'nb_parent_id')
                ->get();
            $categoriesGlobal = Category::with('child')->where('c_parent_id', 0)
                ->select('id', 'c_name', 'c_slug', 'c_parent_id','c_avatar')
                ->get();

        } catch (\Exception $exception) {
            Log::error($exception->getMessage());
        }

        \View::share('menuBlog', $menuBlog ?? []);
        \View::share('configuration', $configuration ?? []);
        \View::share('navBars', $navBars ?? []);
        \View::share('linksGlobal', $linksGlobal ?? []);
        \View::share('categoriesGlobal', $categoriesGlobal ?? []);
        \View::share('phoneGlobal', $phoneGlobal ?? []);
    }
}
