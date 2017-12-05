<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class notice extends Model
{
    public $table = 'notice';
    public $primaryKey = 'nid';
    public $guarded = [];
    public $timestamps = false;


}
