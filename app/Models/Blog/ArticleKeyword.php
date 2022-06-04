<?php

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleKeyword extends Model
{
    use HasFactory;

    protected $table = 'articles_keywords';
    protected $guarded = [''];
}
