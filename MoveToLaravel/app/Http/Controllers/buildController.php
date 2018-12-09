<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\dept_board;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateBoardRequest;
use DB;

class buildController extends Controller
{

    public function __construct(){
        return $this->middleware('auth', ['except'=>'index']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $currentPage = $request->get("page");
        $msgs = dept_board::where("dept_num", "=", "501")->orderBy('id', 'desc')->paginate(3);

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
    
            return view('build.buildBoard')
                ->with('results', $results)
                ->with('currentPage', $currentPage)
                ->with('msgs', $msgs);
        }else{
            return view('build.buildBoard')
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
    
    
            return view('cominfo.writeCominfo_form')
                ->with('results', $results);
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
            'dept_num' => 101,
            'userNick' => $userNick,
            'title' => $title,
            'content' => $contents,
            'hits' => 0,
            'recommend' => 0,
            'affName' => $affName,
        ]);      
        return redirect('cominfo/cominfoBoard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
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

        return view('cominfo.viewCominfo')
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
    public function edit(Request $request)
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

            return view('cominfo.modifyCominfo_form')
                ->with('results', $results)
                ->with('id', $id)
                ->with('page', $page)
                ->with('msgs', $msgs);
        }else{
            return redirect('cominfo/cominfoBoard?page='.$page)->with('message', '권한이 없습니다.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBoardRequest $request)
    {
        //
        $id = $request->id;
        $page = $request->page;
        $title = $request->title;
        $contents = $request->contents;

        $b = dept_board::find($id);

        $b->update([
            'title'=>$title,
            'content'=>$contents
        ]);

        return redirect('cominfo/cominfoBoard')
            ->with('message', $id . '번 글이 수정되었습니다.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $userId = Auth::user()['userId'];

        $id = $request->id;
        $page = $request->page;

        $msgs = dept_board::find($id);

        if(Auth::user()['userNick'] == $msgs->userNick){
            $msgs->delete();

            return redirect('cominfo/cominfoBoard')->with('message', $id . '번 글이 삭제되었습니다.');
        }else{
            return redirect('cominfo/cominfoBoard?page=' . $page)->with('message', '본인만 삭제할 수 있습니다');
        }
    }
}