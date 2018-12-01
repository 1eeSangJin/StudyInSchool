<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    protected $fillable = ["userNick", "title", "content", "hits", "recommend"];
}
