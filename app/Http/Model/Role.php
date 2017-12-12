<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //
    public $table = 'roles';
    public $primaryKey = 'rid';
    public $guarded = [];
    public $timestamps = false;

    public function users()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');

    }

    public function permission()
    {
        return $this->belongsToMany(Permission::class, 'permission_role', 'role_id', 'permission_id');
    }
}
