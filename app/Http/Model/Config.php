<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $table = 'config';

    public $guarded = [];

    public $primaryKey = 'id';

    public $timestamps = false;

    public function tree()
    {
        $configs = $this->orderBy('order','asc')->get();
//       对分类数据进行格式化(排序、缩进)
        return $configs;
    }
}
