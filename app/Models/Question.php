<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //模型关联的表
    public $table = 'question';
    //定义主键
    public $primaryKey = 'qid';
    //定义时间戳
    public $timestamps = false;
    //允许批量修改的字段
}
