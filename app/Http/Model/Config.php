<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    public $table = 'config';

    public $guarded = [];

    public $primaryKey = 'id';

    public $timestamps = false;



}
