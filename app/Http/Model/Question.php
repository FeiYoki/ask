<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'question';
    public $primaryKey = 'qid';
    public $guarded = [];
    //允许批量设置修改的字段
//public $fillable = ['title'];
    public $timestamps = false;
}
