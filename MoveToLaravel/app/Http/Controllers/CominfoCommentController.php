<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Dept_Boards_Comment;
use DB;

class CominfoCommentController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
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

        Dept_Boards_Comment::create([
            'dept_num' => 101,
            'board_num' => $id,
            'userNick' => Auth::user()['userNick'],
            'affName' => $affName,
            'comment' => $comment,
        ]);

        $date = DB::table('dept_boards_comments')
                ->where('userNick', '=', Auth::user()['userNick'])
                ->where('dept_num', '=', '101')
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
