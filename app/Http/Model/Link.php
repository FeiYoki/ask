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

}
