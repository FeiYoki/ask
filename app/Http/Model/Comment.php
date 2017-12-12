<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'question_answer';
    protected $primaryKey = 'id';
    protected $guarded = [];
    public $timestamps = false;
}
