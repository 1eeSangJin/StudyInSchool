<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dept_board extends Model
{
    //
    protected $fillable = ["dept_num", "userNick", "title", "content", "hits", "recommend", "affName"];

}
