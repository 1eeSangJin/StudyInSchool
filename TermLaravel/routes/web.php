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
});

//user//

Route::get('user/loginForm', 'userController@showLoginForm');

Route::post('user/login', 'userController@login');

Route::get('user/signupForm', 'userController@showSignUpForm');

Route::post('user/signup', 'userController@signup');

//user//


//cominfo//
Route::get('cominfo/cominfoBoard', 'cominfoController@showCominfo');

Route::get('cominfo/viewCominfo', 'cominfoController@showViewCominfo');

Route::get('cominfo/writeCominfo_form', 'cominfoController@showWriteCominfo');

Route::get('cominfo/writeCominfo', 'cominfoController@saveWriteCominfo');

Route::get('cominfo/modifyCominfo_form', 'cominfoController@showModifyCominfo');

Route::get('cominfo/modifyCominfo', 'cominfoController@saveModifyCominfo');

Route::get('cominfo/comment', 'cominfoController@writeComment');

Route::get('cominfo/deleteCominfo', 'cominfoController@deleteCominfo');
//cominfo//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

?>
