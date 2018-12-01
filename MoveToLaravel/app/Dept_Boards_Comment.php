<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dept_Boards_Comment extends Model
{
    //
    protected $table = "dept_boards_comments";

    protected $fillable = ["dept_num", "board_num", "userNick", "affName", "comment"];
}
