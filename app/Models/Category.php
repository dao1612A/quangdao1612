<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [''];
    const STATUS_DEFAULT = 1;
    const STATUS_HIDE = 0;
    protected $status = [
        self::STATUS_DEFAULT => [
            'name' => 'Active',
            'class' => 'badge-success'
        ],
        self::STATUS_HIDE => [
            'name' => 'Hide',
            'class' => 'badge-default'
        ]
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->c_status, "[N\A]");
    }

    public function parent()
    {
        return $this->belongsTo(Category::class,'c_parent_id','id');
    }

    public function child()
    {
        return $this->hasMany(self::class,'c_parent_id');
    }

    public static function recursiveAllParent($categoryID  ,&$listCategoriesSort)
    {
        $that = new self();
        if ($categoryID)
        {
            $parentCategory = $that->getParentById($categoryID);
            if ($parentCategory && $parentCategory->c_parent_id)
            {
                $listCategoriesSort[] = $parentCategory->c_parent_id;
                self::recursiveAllParent( $parentCategory->c_parent_id  , $listCategoriesSort);
            }
        }
    }

    public static function recursiveAllChild($categories ,$parents = 0 ,$level = 1 ,&$listCategoriesSort)
    {
        if(count($categories) > 0 )
        {
            foreach ($categories as $key => $value) {
                if($value->c_parent_id  == $parents)
                {
                    $value->level = $level;
                    $listCategoriesSort[] = $value;
                    $parent = $value->id;

                    self::recursiveAllChild($categories , $parent ,$level + 1 , $listCategoriesSort);
                }
            }
        }
    }

    protected function getParentById($parentId)
    {
        return Category::where('id', $parentId)->first();
    }
}
