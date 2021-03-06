<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notices_Comment;
use DB;

class noticecommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     */
    public function __construct(){
        return $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $id = $request->id;
        $comment = $request->comment;

        $userId = Auth::user()['userId'];    
        $datas = DB::table('users')
        ->join('affiliations','affiliations.affNum','=','users.affNum')
        ->where('users.userId', '=' , $userId)
        ->select('affiliations.affName')
        ->get();

        $results = json_decode($datas, true);

        foreach($results as $affName){
            $affName = $affName['affName'];
        }

        Notices_comment::create([
            'board_num' => $id,
            'userNick' => Auth::user()['userNick'],
            'affName' => $affName,
            'comment' => $comment,
        ]);

        $date = DB::table('notices_comments')
                ->where('userNick', '=', Auth::user()['userNick'])
                ->orderBy('created_at', 'desc')
                ->take(1)->get();

        $dateInfo = json_decode($date, true);

        foreach($dateInfo as $createDate){
            $created_at = $createDate['created_at'];
        }
 
        $jsonData = array(
            'board_num' => $id,
            'userNick' => Auth::user()['userNick'],
            'affName' => $affName,
            'comment' => $comment,
            'created_at' => $created_at,
        );

        return response()->json($jsonData);
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        
        $id = $request->id;
        $comment = $request->comment;
        $tdId = $request->tdId;

        $jsonData = array(
            'comment' => $comment,
            'tdId' => $tdId,
        );

        return response()->json($jsonData);
    }

    /**
     * Update the specified resource in storage.
     *
     */
    public function update(Request $request)
    {
        //
        $id = $request->id;
        $comment = $request->comment;
        $tdId = $request->tdId;

        $jsonData = array(
            'comment' => $comment,
            'tdId' => $tdId,
        );

        return response()->json($jsonData);

    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function destroy(Request $request)
    {
        //
        $id = $request->id;
        $date = $request->date;
        $writer = $request->writer;
        $tdId = $request->tdId;

        $msgs = Notices_Comment::where('board_num', $id)
                                ->where('created_at', $date)->delete();

        $jsonData = array(
            'tdId' => $tdId,
            'writer' => $writer,
            'date' => $date,
        );

        return response()->json($jsonData);
    }
}
