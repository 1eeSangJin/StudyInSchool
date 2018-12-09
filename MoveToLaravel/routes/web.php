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

Route::get('test', 'testController@test_query');

Route::get('main', 'mainController@index')->name('main');


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

Route::get('notice/writeNotice_form', 'noticeController@create');

Route::post('notice/writeNotice', 'noticeController@store');

Route::get('notice/viewNotice', 'noticeController@show');

Route::get('notice/modifyNotice_form', 'noticeController@edit');

Route::post('notice/modifyNotice', 'noticeController@update');

Route::post('notice/deleteNotice', 'noticeController@destroy');

Route::post('notice/save', 'noticecommentController@store');

Route::post('notice/delComment', 'noticecommentController@destroy');

Route::post('notice/showComment', 'noticecommentController@update');
//notice//

//cominfo//
Route::get('cominfo/cominfoBoard', 'cominfoController@index');

Route::get('cominfo/viewCominfo', 'cominfoController@show');

Route::get('cominfo/writeCominfo_form', 'cominfoController@create');

Route::post('cominfo/writeCominfo', 'cominfoController@store');

Route::get('cominfo/modifyCominfo_form', 'cominfoController@edit');

Route::post('cominfo/modifyCominfo', 'cominfoController@update');

Route::get('cominfo/deleteCominfo', 'cominfoController@destroy');

Route::post('cominfo/save', 'cominfocommentController@store');

Route::post('cominfo/delComment', 'cominfocommentController@destroy');

Route::post('cominfo/showComment', 'cominfocommentController@update');
//cominfo//

//commachine//
Route::get('commachine/commachineBoard', 'commachineController@index');

Route::get('commachine/viewCommachine', 'commachineController@show');

Route::get('commachine/writeCommachine_form', 'commachineController@create');

Route::post('commachine/writeCommachine', 'commachineController@store');

Route::get('commachine/modifyCommachine_form', 'commachineController@edit');

Route::post('commachine/modifyCommachine', 'commachineController@update');

Route::post('commachine/deleteCommachine', 'commachineController@destroy');

Route::post('commachine/save', 'commcommentController@store');

Route::post('commachine/delComment', 'commcommentController@destroy');

Route::post('commachine/showComment', 'commcommentController@update');
//commachine//

//contents//
Route::get('contents/contentsBoard', 'contentsController@index');

Route::get('contents/viewContents', 'contentsController@show');

Route::get('contents/writeContents_form', 'contentsController@create');

Route::post('contents/writeContents', 'contentsController@store');

Route::get('contents/modifyContents_form', 'contentsController@edit');

Route::post('contents/modifyContents', 'contentsController@update');

Route::post('contents/deleteContents', 'contentsController@destroy');

Route::post('contents/save', 'contentscommentController@store');

Route::post('contents/delComment', 'contentscommentController@destroy');

Route::post('contents/showComment', 'contentscommentController@update');
//contents//

//educate//
Route::get('educate/educateBoard', 'educateController@index');

Route::get('educate/viewEducate', 'educateController@show');

Route::get('educate/writeEducate_form', 'educateController@create');

Route::post('educate/writeEducate', 'educateController@store');

Route::get('educate/modifyEducate_form', 'educateController@edit');

Route::post('educate/modifyEducate', 'educateController@update');

Route::post('educate/deleteEducate', 'educateController@destroy');

Route::post('educate/save', 'educatecommentController@store');

Route::post('educate/delComment', 'educatecommentController@destroy');

Route::post('edcuate/showComment', 'edcuatecommentController@update');
//educate//

//electinfo//
Route::get('electinfo/electinfoBoard', 'electinfoController@index');

Route::get('electinfo/viewElectinfo', 'electinfoController@show');

Route::get('electinfo/writeElectinfo_form', 'electinfoController@create');

Route::post('electinfo/writeElectinfo', 'electinfoController@store');

Route::get('electinfo/modifyElectinfo_form', 'electinfoController@edit');

Route::post('electinfo/modifyElectinfo', 'electinfoController@update');

Route::post('electinfo/deleteElectinfo', 'electinfoController@destroy');

Route::post('electinfo/save', 'electinfocommentController@store');

Route::post('electinfo/delComment', 'electinfocommentController@destroy');

Route::post('electinfo/showComment', 'electinfocommentController@update');
//electinfo//

//energy//
Route::get('energy/energyBoard', 'energyController@index');

Route::get('energy/viewEnergy', 'energyController@show');

Route::get('energy/writeEnergy_form', 'energyController@create');

Route::post('energy/writeEnergy', 'energyController@store');

Route::get('energy/modifyEnergy_form', 'energyController@edit');

Route::post('energy/modifyEnergy', 'energyController@update');

Route::post('energy/deleteEnergy', 'energyController@destroy');

Route::post('energy/save', 'energycommentController@store');

Route::post('energy/delComment', 'enegycommentController@destroy');

Route::post('energy/showComment', 'energycommentController@update');
//energy//

//nurse//
Route::get('nurse/nurseBoard', 'nurseController@index');

Route::get('nurse/viewNurse', 'nurseController@show');

Route::get('nurse/writeNurse_form', 'nurseController@create');

Route::post('nurse/writeNurse', 'nurseController@store');

Route::get('nurse/modifyNurse_form', 'nurseController@edit');

Route::post('nurse/modifyNurse', 'nurseController@update');

Route::post('nurse/deleteNurse', 'nurseController@destroy');

Route::post('nurse/save', 'nursecommentController@store');

Route::post('nurse/delComment', 'nursecommentController@destroy');

Route::post('nurse/showComment', 'nursecommentController@update');
//nurse//

//seesighting//
Route::get('seesighting/seesightingBoard', 'seesightingController@index');

Route::get('seesighting/viewSeesighting', 'seesightingController@show');

Route::get('seesighting/writeSeesighting_form', 'seesightingController@create');

Route::post('seesighting/writeSeesighting', 'seesightingController@store');

Route::get('seesighting/modifySeesighting_form', 'seesightingController@edit');

Route::post('seesighting/modifySeesighting', 'seesightingController@update');

Route::post('seesighting/deleteSeesighting', 'seesightingController@destroy');

Route::post('seesighting/save', 'seecommentController@store');

Route::post('seesighting/delComment', 'seecommentController@destroy');

Route::post('seesighting/showComment', 'seecommentController@update');
//seesighting//

//smart//
Route::get('smart/smartBoard', 'smartController@index');

Route::get('smart/viewSmart', 'smartController@show');

Route::get('smart/writeSmart_form', 'smartController@create');

Route::post('smart/writeSmart', 'smartController@store');

Route::get('smart/modifySmart_form', 'smartController@edit');

Route::post('smart/modifySmart', 'smartController@update');

Route::post('smart/deleteSmart', 'smartController@destroy');

Route::post('smart/save', 'smartcommentController@store');

Route::post('smart/delComment', 'smartcommentController@destroy');

Route::post('smart/showComment', 'smartcommentController@update');
//smart//

//soldier//
Route::get('soldier/soldierBoard', 'soldierController@index');

Route::get('soldier/viewSoldier', 'soldierController@show');

Route::get('soldier/writeSoldier_form', 'soldierController@create');

Route::post('soldier/writeSoldier', 'soldierController@store');

Route::get('soldier/modifySoldier_form', 'soldierController@edit');

Route::post('soldier/modifySoldier', 'soldierController@update');

Route::post('soldier/deleteSoldier', 'soldierController@destroy');

Route::post('soldier/save', 'soldiercommentController@store');

Route::post('soldier/delComment', 'soldiercommentController@destroy');

Route::post('soldier/showComment', 'soldiercommentController@update');
//soldier//

//welfare//
Route::get('welfare/welfareBoard', 'welfareController@index');

Route::get('welfare/viewWelfare', 'welfareController@show');

Route::get('welfare/writeWelfare_form', 'welfareController@create');

Route::post('welfare/writeWelfare', 'welfareController@store');

Route::get('welfare/modifyWelfare_form', 'welfareController@edit');

Route::post('welfare/modifyWelfare', 'welfareController@update');

Route::post('welfare/deleteWelfare', 'welfareController@destroy');

Route::post('welfare/save', 'welfarecommentController@store');

Route::post('welfare/delComment', 'welfarecommentController@destroy');

Route::post('welfare/showComment', 'welfarecommentController@update');
//welfare//

//build
Route::get('build/buildBoard', 'buildController@index');

Route::get('build/viewBuild', 'buildController@show');

Route::get('build/writeBuild_form', 'buildController@create');

Route::post('build/writeBuild', 'buildController@store');

Route::get('build/modifyBuild_form', 'buildController@edit');

Route::post('build/modifyBuild', 'buildController@update');

Route::post('build/deleteBuild', 'buildController@destroy');

Route::post('build/save', 'buildcommentController@store');

Route::post('build/delComment', 'buildcommentController@destroy');

Route::post('build/showComment', 'buildcommentController@update');
//


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', function () {
    return view('welcome');
});

?>

