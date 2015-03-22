<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/addToken/{code}', function($code)
{
    Analytics::where('ID',1)->update(['token' => $code]);
    return Redirect::to('analytics');
    
});
Route::get('/', function()
{
    return View::make('frontend'); 
});

Route::get('/analytics', 'AnalyticsController@analytics');

/*Route::get('/about','myController@aboutPage');
//Route::get('usama/', function()
//{
//	$name = "sajad";

//	return View::make('usama')->with('name',$name);
	
//});

*/


Route::get('/index', 'UserController@index'
)->before('auth');
Route::get('/user', 'UserController@index'
)->before('auth');


//TAG ROUTE
Route::get('/Tag','TagController@tagGet')->before('auth');;
Route::post('/updateTag','TagController@updateTag')->before('auth');;
Route::post('/deleteTag','TagController@deleteTag')->before('auth');;
Route::get('/tagTable','TagController@tagTable')->before('auth');;

Route::get('/tagOptions','TagController@tagOptions')->before('auth');;

Route::post('/Tag','TagController@tagPost')->before('auth');;


//Generate Report Route
Route::get('/generateReportTable','GenerateReportController@generateReportTable')->before('auth');;

Route::get('/getCityName',function(){
    $city_ID = Input::get('ID');
    return City::where('city_ID',$city_ID)->first()->name;
    
    
})->before('auth');;

Route::get('/popupReport',function(){
    
    return View::make('popupReport',['user' => Auth::user()]);
    
})->before('auth');;


Route::get('/gImportantNew','GenerateReportController@gImportantNew')->before('auth');;
Route::get('/gIdaria','GenerateReportController@gIdaria')->before('auth');;
Route::get('/gColumn','GenerateReportController@gColumn')->before('auth');;


Route::get('/GenerateReport','GenerateReportController@gReportPage')->before('auth');;
Route::post('/GenerateReport','GenerateReportController@gReportPost')->before('auth');;

//Report Route
Route::get('/reportTable','ReportController@reportTable')->before('auth');

Route::get('/Report','ReportController@reportPage')->before('auth');
Route::post('/Report','ReportController@reportPagePost')->before('auth');
Route::post('/updateReport','ReportController@updateReport')->before('auth');
Route::post('/deleteReport','ReportController@deleteReport')->before('auth');

Route::get('/getCol','ReportController@getCol')->before('auth');
Route::get('/getPg','ReportController@getPg')->before('auth');


//PressRelease Route
Route::get('/pressReleaseTable','PressReleaseController@pressReleaseTable')->before('auth');;
Route::get('/uploadFileButton',function(){
    return View::make('uploadFileButton');
    
});
Route::get('/empty',function(){
    return View::make('empty');
    
});
Route::get('/jason',function(){
    return View::make('jason');
    
});
Route::get('/PressRelease','PressReleaseController@pReleasePage')->before('auth');;
Route::post('/PressRelease','PressReleaseController@pReleasePagePost')->before('auth');;
Route::post('/updatePressRelease','PressReleaseController@updatePressRelease')->before('auth');;
Route::post('/deletePressRelease','PressReleaseController@deletePressRelease')->before('auth');;

//Columns Route
Route::get('upload', function() {
  return View::make('columns1')->before('auth');;
});

Route::post('upload', 'ColumnsController@upload');


Route::get('/columnsTable','ColumnsController@columnsTable')->before('auth');;

Route::get('/Columns','ColumnsController@columnsPage')->before('auth');;
Route::post('/Columns','ColumnsController@ColumnsPagePost')->before('auth');;
Route::post('/updateColumns','ColumnsController@updateColumns')->before('auth');;
Route::post('/deleteColumns','ColumnsController@deleteColumns')->before('auth');;



//city Route
Route::get('/cityTable','CityController@cityTable')->before('auth');;

Route::get('/City','CityController@cityPage')->before('auth');;
Route::post('/City','CityController@cityPagePost')->before('auth');;

Route::post('/updateCity','CityController@updateCity')->before('auth');;
//Newspaper Route
Route::get('/newspaperTable','NewspaperController@newspaperTable')->before('auth');;

Route::get('/Newspaper','NewspaperController@newspaperPage')->before('auth');;
Route::post('/Newspaper','NewspaperController@newspaperPagePost')->before('auth');;
Route::post('/deleteNewspaper','NewspaperController@deleteNewspaper')->before('auth');;
Route::post('/updateNewspaper','NewspaperController@updateNewspaper')->before('auth');;



//Leader Route
Route::get('/leaderTable','LeaderController@leaderTable')->before('auth');;

Route::get('/Leader','LeaderController@leaderPage')->before('auth');;
Route::post('/Leader','LeaderController@leaderPagePost')->before('auth');;
Route::post('/updateLeader','LeaderController@updateLeader')->before('auth');;
Route::post('/deleteLeader','LeaderController@deleteLeader')->before('auth');;

//recover password routes

Route::get('/recoverPasswordToken/{code}','RecoverPassword@recoverPasswordToken');

Route::get('/recoverPassword','RecoverPassword@recoverPasswordForm');
Route::post('/recoverPassword','RecoverPassword@recoverPassword');


Route::get('/register', 'HomeController@registerPage');
Route::post('/register', 'UserController@register');
Route::get('/login', 'HomeController@loginPage');
Route::post('/login', 'UserController@login');



Route::get('/profile', 'UserController@profile')->before('auth');;


Route::get('/logout', 'UserController@logout');
Route::post('/updatePersonal', 'UserController@updatePersonel')->before('auth');;

Route::post('/updatePassword', 'UserController@updatePassword')->before('auth');;


/*Route::get('/users/','UserController@all');
Route::get('/users/{username}',function($username){
	$sUser = new UserController();

	return $sUser->specific($username);
	//return $username;

});
*/