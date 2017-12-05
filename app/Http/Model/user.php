<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = 'admin_user';
    public $primaryKey = 'id';
    public $guarded = [];
    public $timestamps = false;
}
