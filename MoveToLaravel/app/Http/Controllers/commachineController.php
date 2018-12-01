<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\dept_board;

class commachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        return $this->middleware('auth', ['except'=>'index']);
    }
    
    public function index(Request $request)
    {
        //
        $currentPage = $request->get("page");
        $msgs = dept_board::where("dept_num", "=", "201")->orderBy('id', 'desc')->paginate(3);

        if($currentPage<1){
            $currentPage = 1;
        }

        if(Auth::check()){
            $userId = Auth::user()['userId'];
    
            $datas = DB::table('users')
            ->join('affiliations','affiliations.affNum','=','users.affNum')
            ->where('users.userId', '=' , $userId)
            ->select('affiliations.affName')
            ->get();
    
            $results = json_decode($datas, true);
    
            return view('commachine.commachineBoard')
                ->with('results', $results)
                ->with('currentPage', $currentPage)
                ->with('msgs', $msgs);
        }else{
            return view('commachine.commachineBoard')
                ->with('currentPage', $currentPage)
                ->with('msgs',$msgs);
        }
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('commachine.writeCommachine_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
