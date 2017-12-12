<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    //
    public $table = 'class';

    public $guarded = [];

    public $primaryKey = 'cid';

    public $timestamps = false;

//    public function tree()
//    {
//        $cates = $this->orderBy('order','asc')->get();
////        dd($cates);
////       对分类数据进行格式化(排序、缩进)
//        return $this->getTree($cates,0);
//    }
    public static function tree()
    {
        $cates = self::orderBy('order','asc')->get();
        //对分类数据进行格式化（排序、缩进）
        return  self::getTree($cates,0);
    }


    /**
     * 对分类数据进行格式化(排序、缩进)
     */

    public static function getTree($Category, $pid)
    {
        // 存放最终结果的数组
        $arr = [];
//        dd($pid);
        foreach ($Category as $k=>$v){
//            dd($Category);
            // 如果是当前遍历的类是一级类
            if ($v->pid == $pid) {
                //复制当前分类的名称给names字段
                $v->cnames = '|--'.$v->cname;
//                dd($v);
                $arr[] = $v;
//                dd($arr);
                // 找到当前一级类下的二级类
                foreach ($Category as $m=>$n) {
//                    dd($Category);
                    //如果一个分类的pid == $v这个类的id,那这个类就是$v的子类
                    if ($n->pid == $v->cid ) {
                        $n->cnames = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.'|--'.$n->cname;
                        $arr[] = $n;

//                        dd($arr);
                    }
                }
            }
        }

        return $arr;
    }
}
