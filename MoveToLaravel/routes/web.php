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

Route::get('user/loginForm', 'userController@showLoginForm');

Route::post('user/login', 'userController@login');

Route::get('user/signupForm', 'userController@showSignUpForm');

Route::post('user/signup', 'userController@signup');

Route::get('user/userRegister', 'userController@showRegisterForm');

Route::post('user/userRegister', 'userController@register');

//user//

//cominfo//
Route::get('cominfo/cominfoBoard', 'cominfoController@index');

Route::get('cominfo/viewCominfo', 'cominfoController@show');

Route::get('cominfo/writeCominfo_form', 'cominfoController@create');

Route::post('cominfo/writeCominfo', 'cominfoController@store');

Route::get('cominfo/modifyCominfo_form', 'cominfoController@edit');

Route::get('cominfo/modifyCominfo', 'cominfoController@update');

Route::get('cominfo/comment', 'cominfoController@writeComment');

Route::get('cominfo/deleteCominfo', 'cominfoController@deleteCominfo');
//cominfo//

Auth::routes();

Route::resource('user/test', 'ReggController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

?>

