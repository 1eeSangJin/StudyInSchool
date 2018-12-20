<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\dept_board;
use DB;


class mainController extends Controller
{
    //
    public function index(){
        $name = Auth::user()['name'];

        $latest = dept_board::orderBy('created_at', 'desc')->take(4)->get();


        $dept = DB::table('dept_boards')
            ->join('departments', 'departments.dept_num', '=', 'dept_boards.dept_num')
            ->select('departments.dept_name')
            ->orderBy('dept_boards.created_at', 'desc')
            ->get();

        $deptName = json_decode($dept, true);

        $dept_name = array();
        $i = 0;

        foreach($deptName as $name){
            $dept_name[$i] = $name['dept_name'];
            $i++;
        }

        if(Auth::check()){

            $datas = DB::table('users')
            ->join('affiliations','affiliations.affNum','=','users.affNum')
            ->where('users.userNick', '=' , $name)
            ->select('affiliations.affName')
            ->get();
    
            $results = json_decode($datas, true);
    
            return view('main')
                ->with('latest', $latest)
                ->with('dept_name', $dept_name)
                ->with('results', $results);

        }else{
            return view('main')
                ->with('dept_name', $dept_name)
                ->with('latest', $latest);
        }
    }
}
