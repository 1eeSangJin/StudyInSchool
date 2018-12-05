<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notices_Comment extends Model
{
    //
    protected $table = 'notices_comments';

    protected $fillable = ["board_num", "userNick", "affName", "comment"];
}
