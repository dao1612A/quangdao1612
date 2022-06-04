<?php

namespace App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';
    protected $guarded = [''];

    const STATUS_WARNING = 0;
    const STATUS_DEFAULT = 1;
    const STATUS_PROCESS = 2;
    const STATUS_SUCCESS = 3;
    const STATUS_CANCEL = -1;

    public $status =  [
        self::STATUS_WARNING => [
            'name' => 'Chờ duyệt',
            'class' => ''
        ],
        self::STATUS_DEFAULT => [
            'name' => 'Mới',
            'class' => ''
        ],
        self::STATUS_PROCESS => [
            'name' => 'Đã nhận',
            'class' => ''
        ],
        self::STATUS_SUCCESS => [
            'name' => 'Hoàn thành',
            'class' => ''
        ],
        self::STATUS_CANCEL => [
            'name' => 'Huỷ bỏ',
            'class' => ''
        ],
    ];

    public function getStatus()
    {
        return Arr::get($this->status, $this->prj_status, '');
    }

    public function languages()
    {
        return $this->belongsToMany(ProgrammingLanguage::class,'project_programming_language','ppl_project_id','ppl_language_id');
    }
}
