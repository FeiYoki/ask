<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //
    public $table = 'links';
    public $primaryKey = 'lid';
    public $guarded = [];
    public $timestamps = false;

    public function tree()
    {
        $links = $this->orderBy('order','asc')->get();
//       对分类数据进行格式化(排序、缩进)
        return $links;
    }
}
