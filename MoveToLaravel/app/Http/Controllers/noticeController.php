<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UpdateNoticesRequest;
use DB;
use App\Notice;
use App\Notices_Comment;

class noticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        return $this->middleware('auth', ['except'=>['index', 'show']]);
    }

    public function index(Request $request)
    {
        //
        $currentPage = $request->get("page");
        $msgs = Notice::orderBy('id', 'desc')->paginate(3);

        $arr = array();
        $i = 0;
        foreach($msgs as $row){  
            $arr[$i] =  Notices_Comment::where("board_num", "=", $row['id'])->count();
            $i++;
        }

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
    
            return view('notice.noticeBoard')
                ->with('results', $results)
                ->with('count', $arr)
                ->with('currentPage', $currentPage)
                ->with('msgs', $msgs);
        }else{
            return view('notice.noticeBoard')
            ->with('currentPage', $currentPage)
            ->with('count', $arr)
            ->with('msgs', $msgs);
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
        if(Auth::check()){
            $userId = Auth::user()['userId'];
    
            $datas = DB::table('users')
            ->join('affiliations','affiliations.affNum','=','users.affNum')
            ->where('users.userId', '=' , $userId)
            ->select('affiliations.affName')
            ->get();
    
            $results = json_decode($datas, true);
    
            return view('notice.writeNotice_form')
                    ->with('results', $results);
        }else{
            return view('notice.writeNotice_form');
        }
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
        $title = $request->title;
        $contents = $request->contents;

        Notice::create([
            'userNick' => $userNick,
            'title' => $title,
            'content' => $contents,
            'hits' => 0,
            'recommend' => 0,
        ]);
        return redirect('notice/noticeBoard')->with('message', '글이 등록되었습니다');
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

        $msgs = Notice::find($id);

        $comments = Notices_Comment::where("board_num", "=", $id)->get();

        $count =  Notices_Comment::where("board_num", "=", $id)->count();

        if(Auth::check()){
            $msgs -> update(['hits'=>$msgs->hits+1]);
        }

        return view('notice.viewNotice')
            ->with('results', $results)
            ->with('id', $id)
            ->with('page', $page)
            ->with('msgs', $msgs)
            ->with('count', $count)
            ->with('comments', $comments);
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

        $msgs = Notice::find($id);

        if(Auth::user()['userNick'] == $msgs->userNick){
    
        $datas = DB::table('users')
        ->join('affiliations','affiliations.affNum','=','users.affNum')
        ->where('users.userId', '=' , $userId)
        ->select('affiliations.affName')
        ->get();

        $results = json_decode($datas, true);

        return view('notice.modifyNotice_form')
            ->with('results', $results)
            ->with('id', $id)
            ->with('page', $page)
            ->with('msgs', $msgs);
        }else{
            return redirect('notice/noticeBoard?page='.$page)->with('message', '권한이 없습니다.');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticesRequest $request)
    {
        //
        $msgs = Notice::orderBy('id', 'desc')->paginate(3);

        foreach($msgs as $row){
            $count =  Notices_Comment::where("board_num", "=", $row['id'])->count();
        }

        $id = $request->id;
        $page = $request->page;
        $title = $request->title;
        $contents = $request->contents;

        $n = Notice::find($id);

        $n->update([
            'title'=>$title,
            'content'=>$contents
        ]);

        return redirect('notice/noticeBoard')
            ->with('count', $count)
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
        $id = $request->id;

        $msgs = Notice::find($id);

        $msgs->delete();

        return redirect()->intended('notice')->with('message', $id . '번 글이 삭제되었습니다.');
    }
}
