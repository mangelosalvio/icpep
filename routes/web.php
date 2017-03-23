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

use App\Registration;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/new-membership','MembershipsController@create');
Route::get('/home', 'HomeController@index');
Route::resource('/registrations','RegistrationsController');
Route::resource('/memberships','MembershipsController');

Route::get('/reports','ReportsController@index');
Route::get('/shuffle-students',function(){
    $students = Registration::whereTypeOfParticipant('S')->get();
    return view('students_shuffle',compact(['students']));
});

Route::get('/shuffle-professionals',function(){
    $students = Registration::whereTypeOfParticipant('P')->get();
    return view('professionals_shuffle',compact(['students']));
});
Route::get('/reports/cert-attendance','ReportsController@certAttendance');

Route::get('/reports/cert-membership-regular-1year','ReportsController@certMembershipRegular1Year');
Route::get('/reports/cert-membership-associate','ReportsController@certMembershipAssociate');
Route::get('/reports/cert-membership-regular-3years','ReportsController@certMembershipRegular3Years');
Route::get('/reports/cert-attendance-with-image','ReportsController@certAttendanceWithImage');

Auth::routes();

Route::get('/home', 'HomeController@index');
