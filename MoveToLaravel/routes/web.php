<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('main',function(){
    return view('main');
})->name('main');


//user//
Route::get('user/loginForm', 'userController@showLoginForm')->name('loginForm');

Route::get('user/signupForm', 'userController@showSignUpForm');

Route::get('user/userRegister', 'userController@showRegisterForm');

Route::get('user/userUpdate', 'userController@showUpdateUserForm');

Route::post('user/userUpdate', 'userController@update');

Route::post('user/deleteUser', 'userController@destroy');
//user//

//notice//
Route::get('notice/noticeBoard', 'noticeController@index');
//notice//

//cominfo//
Route::get('cominfo/cominfoBoard', 'cominfoController@index');

Route::get('cominfo/viewCominfo', 'cominfoController@show');

Route::get('cominfo/writeCominfo_form', 'cominfoController@create');

Route::post('cominfo/writeCominfo', 'cominfoController@store');

Route::get('cominfo/modifyCominfo_form', 'cominfoController@edit');

Route::post('cominfo/modifyCominfo', 'cominfoController@update');

Route::post('cominfo/deleteCominfo', 'cominfoController@destroy');

Route::get('cominfo/comment', 'cominfoController@writeComment');
//cominfo//

//commachine//
Route::get('commachine/commachineBoard', 'commachineController@index');

Route::get('commachine/viewCommachine', 'commachineController@show');

Route::get('commachine/writeCommachine_form', 'commachineController@create');

Route::post('commachine/writeCommachine', 'commachineController@store');

Route::get('commachine/modifyCommachine_form', 'commachineController@edit');

Route::post('commachine/modifyCommachine', 'commachineController@update');

Route::post('commachine/deleteCommachine', 'commachineController@destroy');
//commachine//

Auth::routes();

Route::resource('user/test', 'ReggController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

?>

