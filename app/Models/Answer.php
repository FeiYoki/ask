<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public $table = 'answer';
    public $primaryKey = 'aid';
    public $guarded = [];
    public $timestamps = false;

}
