<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'main';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'userId' => ['required', 'string', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'userNick' => ['required', 'string', 'unique:users'],
            'name' => ['required', 'string', 'max:255'],
            'sex' => ['required'],
            'userPhone' => ['required'],
            'affNum' => ['required'],
            'confirm_code' => ['requred'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        $user =  User::create([
            'confirm_code' => $data['confirm'],
            'userId' => $data['userId'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'userNick' => $data['userNick'],
            'name' => $data['name'],
            'sex' => $data['sex'],
            'userPhone' => $data['userPhone'],
            'affNum' => $data['affNum'],
        ]);

        \Mail::send('user.confirm', compact('user'), function($message) use($user){
            $message->to($user->email);
            $message->subject("YEUNGJIN INSIDE에 오신 것을 환영합니다");
        });

        return redirect('main')->with('message', '가입 확인 메일을 확인 해 주세요.');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new RegisterController($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }
}
