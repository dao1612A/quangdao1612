<?php


namespace App\Service\Navbars;


use App\Models\System\NavBar;

class NavBarsService
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

    public function getListLocations()
    {
        return NavBar::with('parent:id,nb_name')
            ->get();
    }

    public function recursive($parents = 0 ,$level = 1 ,&$listCategoriesSort)
    {
        if ($this->categories == null) {
            $this->categories = $this->getListLocations();
        }

        if(count($this->categories) > 0 )
        {
            foreach ($this->categories as $key => $value) {
                if($value->nb_parent_id  == $parents)
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