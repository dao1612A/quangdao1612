<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgrammingLanguage extends Model
{
    use HasFactory;
    protected $guarded = [''];
    protected $table = 'project_programming_language';
}
