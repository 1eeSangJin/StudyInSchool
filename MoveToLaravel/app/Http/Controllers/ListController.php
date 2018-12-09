<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Middleware\CheckAdmin;
use DB;
use App\User;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(){
        return $this->middleware('CheckAdmin');
    }
    public function index()
    {
        //
        $list = User::orderBy('id', 'asc')->get();

        $datas = DB::table('users')
            ->join('affiliations','affiliations.affNum','=','users.affNum')
            ->where('users.userNick', '=' , 'Administrator')
            ->select('affiliations.affName')
            ->get();
    
        $results = json_decode($datas, true);
    
        return view('user.userList')
            ->with('list', $list)
            ->with('results', $results);

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
        $id = $request->id;
        
        $user = User::find($id);

        $datas = DB::table('users')
        ->join('affiliations','affiliations.affNum','=','users.affNum')
        ->where('users.userNick', '=' , 'Administrator')
        ->select('affiliations.affName')
        ->get();

        $results = json_decode($datas, true);

        return view('user.adminUpdate')
            ->with('id', $id)
            ->with('user', $user)
            ->with('results', $results);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //

        $id = $request->id;

        $userId = $request->userId;
        $email = $request->email;
        $userNick = $request->userNick;
        $userPhone = $request->userPhone;
        $sex = $request->sex;
        $affNum = $request->affNum;

        $u = User::find($id);

        $u->email = $email;
        $u->userNick = $userNick;
        $u->userPhone = $userPhone;
        $u->sex = $sex;
        $u->affNum = $affNum;

        $u->save();

        return redirect('user/userList')->with('message', $id.'번 회원정보가 수정되었습니다.');


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

        $user = User::find($id);

        $user->delete();

        return redirect('user/userList')->with('message', $id.'번 회원이 삭제되었습니다.');


    }
}
