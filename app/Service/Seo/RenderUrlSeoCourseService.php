<?php


namespace App\Service\Seo;


use App\Models\Education\SeoEdutcation;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class RenderUrlSeoCourseService
{
    const PREFIX_CATEGORY = '-c';
    const PREFIX_TAG = '-t';
    const PREFIX_COURSE = '-cr';
    const PREFIX_PRODUCT = '-pro';
    const PREFIX_KEYWORD = '-k';

    const TYPE_CATEGORY = 1;
    const TYPE_TAG = 2;
    const TYPE_COURSE = 3;
    const TYPE_PRODUCT = 4;
    const TYPE_KEYWORD = 5;

    public static function init($slug, $type, $id)
    {
        try{
            $that = new self();
            switch ($type)
            {
                case self::TYPE_CATEGORY:
                    $prefix = self::PREFIX_CATEGORY;
                    break;

                case self::TYPE_TAG:
                    $prefix = self::PREFIX_TAG;
                    break;

                case self::TYPE_COURSE:
                    $prefix = self::PREFIX_COURSE;
                    break;

                case self::TYPE_PRODUCT:
                    $prefix = self::PREFIX_PRODUCT;
                    break;

                case self::TYPE_KEYWORD:
                    $prefix = self::PREFIX_KEYWORD;
                    break;
            }
            $slug = Str::slug($slug . $prefix);

            $slugMd5 = md5($slug);
            $check = $that->checkUrl($slugMd5);
            if($check)
            {
                SeoEdutcation::insert([
                    'se_md5' => $slugMd5,
                    'se_slug' => $slug,
                    'se_type' => $type,
                    'se_id' => $id,
                    'created_at' => Carbon::now()
                ]);
            }
        }catch (\Exception $exception)
        {
            Log::error("[RenderUrlSeoCourseService init :]" . $exception->getMessage());
        }
    }

    public static function deleteUrlSeo($type, $id)
    {
        try{
            SeoEdutcation::where([
                'se_id' => $id,
                'se_type' => $type
            ])->delete();
        }catch (\Exception $exception){
            Log::error("[deleteUrlSeo init :]" . $exception->getMessage());
        }
    }

    protected function checkUrl($md5Slug)
    {
        $seo = SeoEdutcation::where([
            'se_md5' => $md5Slug,
        ])->first();

        if ($seo) return false;
        return  true;
    }
}
