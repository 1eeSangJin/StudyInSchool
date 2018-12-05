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
        $userId = Auth::user()['userId'];
    
        $datas = DB::table('users')
        ->join('affiliations','affiliations.affNum','=','users.affNum')
        ->where('users.userId', '=' , $userId)
        ->select('affiliations.affName')
        ->get();

        $results = json_decode($datas, true);

        return view('commachine.writeCommachine_form')
            ->with('results', $results);;
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
        $userNick = $request->userNick;
        $affName = $request->affName;
        $title = $request->title;
        $contents = $request->contents;

        $b = dept_board::create([
            'dept_num' => 201,
            'userNick' => $userNick,
            'title' => $title,
            'content' => $contents,
            'hits' => 0,
            'recommend' => 0,
            'affName' => $affName,
        ]);      

        return redirect('commachine/writeCommachine_form');
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
        $userId = Auth::user()['userId'];
    
        $datas = DB::table('users')
        ->join('affiliations','affiliations.affNum','=','users.affNum')
        ->where('users.userId', '=' , $userId)
        ->select('affiliations.affName')
        ->get();

        $results = json_decode($datas, true);

        $id = $request->id;
        $page = $request->page;

        $msgs = dept_board::find($id);

        $msgs -> update(['hits'=>$msgs->hits+1]);

        return view('commachine.writeCommachine_form')
        ->with('results', $results)
        ->with('id', $id)
        ->with('page', $page)
        ->with('msgs', $msgs);
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
        $userId = Auth::user()['userId'];

        $id = $request->id;
        $page = $request->page;

        $msgs = dept_board::find($id);

        if(Auth::user()['userNick'] == $msgs->userNick){
            $datas = DB::table('users')
            ->join('affiliations','affiliations.affNum','=','users.affNum')
            ->where('users.userId', '=' , $userId)
            ->select('affiliations.affName')
            ->get();

            $results = json_decode($datas, true);

            return view('commachine.writeCommachine_form')
            ->with('results', $results)
            ->with('id', $id)
            ->with('page', $page)
            ->with('msgs', $msgs);
        }else{
            return redirect('commachine/writeCommachine_form')->with('message', '본인만 수정할 수 있습니다.');
        }
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
