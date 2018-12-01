<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class testController extends Controller
{
    //

    public function test_query(){
        $data = DB::table('users')
                ->join('affiliations','affiliations.affNum','=','users.affNum')
                ->where('users.userId', '=', 'user1')
                ->select('affiliations.affName')
                ->get();

        $result = json_decode($data, true);
        echo "<pre>";
        print_r($result);

    }
}
