<?php

namespace App\Service\Category;


use App\Models\Category;

class CategoryService
{
    public static $instance = null;
    public $categories = null;
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    public function getListCategories()
    {
        return Category::with('parent:id,c_name')
            ->get();
    }

    public function recursive($parents = 0 ,$level = 1 ,&$listCategoriesSort)
    {
        if ($this->categories == null) {
            $this->categories = $this->getListCategories();
        }

        if(count($this->categories) > 0 )
        {
            foreach ($this->categories as $key => $value) {
                if($value->c_parent_id  == $parents)
                {
                    $value->level = $level;
                    $listCategoriesSort[] = $value;
                    unset($this->categories[$key]);
                    $parent = $value->id;

                    $this->recursive( $parent ,$level + 1 , $listCategoriesSort);
                }
            }
        }
    }
}