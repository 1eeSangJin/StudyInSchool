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
        $nick = Auth::user()['userNick'];

        $latest = dept_board::orderBy('created_at', 'desc')->paginate(4);

        $dept = DB::table('dept_boards')
            ->join('departments', 'departments.dept_num', '=', 'dept_boards.dept_num')
            ->select('departments.dept_name')
            ->get();

        $deptName = json_decode($dept, true);

        foreach($deptName as $name){
            $dept_name = $name['dept_name'];
        }

        if(Auth::check()){

            $datas = DB::table('users')
            ->join('affiliations','affiliations.affNum','=','users.affNum')
            ->where('users.userNick', '=' , $nick)
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
