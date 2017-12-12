<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'admin_user';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;

    /**
     * 通过用户模型查找关联的角色模型
     * @return mixed
     */
    public function role()
    {
        return $this->belongsToMany('App\Http\Model\Role', 'role_user', 'user_id', 'role_id');
    }

//    关联用户详情模型
    public function userifo()
    {
        return $this->hasOne('App\Http\Model\UserInfo', 'uid', 'user_id');

    }

}
