<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class HomeUser extends Model
{
    public $table = 'index_user';
    public $primaryKey = 'uid';
    public $guarded = [];
    public $timestamps = false;
}
