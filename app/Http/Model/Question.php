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
    //对类进行连查
    public function cate()
    {
        return $this->belongsTo('App\Http\Model\Cate','cid','cid');
    }

    /*问题所有回答*/
    public function answers()
    {
        return $this->hasOne('App\Models\Answer','qid');
    }
}
