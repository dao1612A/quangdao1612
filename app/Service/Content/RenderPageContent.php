<?php


namespace App\Service\Content;


use App\Models\System\Page;
use Illuminate\Support\Facades\Log;

class RenderPageContent
{
    public static function getPage()
    {
        try{
            $url = \Request::url();
            $url = replace_url($url);
            if (!$url) $url = '/';

            return Page::where('url', $url)->first();
        }catch (\Exception $exception){
            Log::error("[RenderPageContent: ]". $exception->getMessage());
        }

        return  null;
    }
}