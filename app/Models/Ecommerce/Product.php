<?php

namespace App\Models\Ecommerce;

use App\Models\Blog\Keyword;
use App\Models\Category;
use App\Models\System\Admin;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [''];

    public function keywords()
    {
        return $this->belongsToMany(Keyword::class,'products_keywords','pk_product_id','pk_keyword_id');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class,'pro_auth_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'pro_category_id');
    }
}
