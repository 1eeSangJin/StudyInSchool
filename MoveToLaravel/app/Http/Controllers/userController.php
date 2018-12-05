<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use Hash;
use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\UpdateUsersRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class userController extends Controller
{
    //

    public function __construct(){
        return $this->middleware('guest', ['except'=>['showUpdateUserForm, update']]);
    }

    public function showLoginForm(){
        return view('user.loginForm');
    }

    public function showRegisterForm(){
        return view('user.userRegister');
    }

    public function showUpdateUserForm(){
        $userId = Auth::user()['userId'];
    
        $datas = DB::table('users')
        ->join('affiliations','affiliations.affNum','=','users.affNum')
        ->where('users.userId', '=' , $userId)
        ->select('affiliations.affName')
        ->get();

        $results = json_decode($datas, true);

        return view('user.userUpdate')
            ->with('$results', $results);
    }

    public function update(UpdateUsersRequest $request){

        $userId = $request->userId;
        $password = $request->password;
        $email = $request->email;
        $userNick = $request->userNick;
        $userPhone = $request->userPhone;

        $u = User::where('userId',$userId) -> first();

        $u->password = Hash::make($password);
        $u->email = $email;
        $u->userNick = $userNick;
        $u->userPhone = $userPhone;

        $u->save();

        return redirect('main');
        
    
    }
}
