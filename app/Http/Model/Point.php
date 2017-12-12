<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{

    public $table = 'points_list';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;

//    /*
//     * 记录积分明细
//     */
//    public function setpoints($uid,$points,$txt,$opid=0){
//         $data=[
//               'uid'       => $uid, //会员ID，就你要给那个会员操作积分就传入那个会员的ID
//               'points'  => $points,//操作的积分数量,正数为加分，负数为减分；
//               'optxt'    => $txt,   //操作理由，简单的积分操作理由；
//               'optime' => time(), //操作时间
//               'opid'     => $opid  //操作员ID,如果为0表示系统操作；
//         ];
//         M('points_list')->add($data);    //写入积分操作明细数据；
//         M('index_user')->setInc('score',$points);   //更用户表表积分字段；
//    }
    public function user()
    {
        return $this->belongsTo('App\Http\Model\User','uid','uid');
    }
}
