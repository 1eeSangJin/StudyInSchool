<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    //
    protected $fillable = ["dept_num", "dept_name"];

    public $timestamps = false;
}
