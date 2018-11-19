<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dept_board extends Model
{
    //
    protected $fillable = ["affNum", "userNick", "title", "content", "hits", "recommend", "affName"];

}
