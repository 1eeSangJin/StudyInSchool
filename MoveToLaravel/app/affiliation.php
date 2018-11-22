<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class affiliation extends Model
{
    //

    public function user(){
        return $this->belongsTo(User::class, 'affNum');
    }
}
