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
//use Illuminate\Support\Facades\Auth;
Route::get('/', function () {
    return view('front.home');
})->name('homepage');
Route::middleware('auth')->group(function () {

    // uses 'auth' middleware plus all middleware from $middlewareGroups['web']
    Route::post('/admin/contestants/reject', 'ContestantsController@reject')->name('contestants.reject');
//reports
    Route::get('/admin/reports/form/{form_id}', 'ReportsController@form')->name('reports.form');
    Route::get('/admin/reports/contestants/votes', 'ReportsController@candidates_and_votes_garnered')->name('reports.contestants.vote.ganered');
    Route::get('/admin/reports/candidate_for_each_post', 'ReportsController@candidate_for_each_post')->name('reports.candidate_for_each_post');
    Route::get('/admin/reports/spoilt_votes', 'ReportsController@spoilt_votes')->name('reports.spoilt_votes');
    Route::get('/admin/reports/winners', 'ReportsController@winners')->name('reports.winners');
    Route::get('/admin/reports/class_teachers', 'ReportsController@class_teachers')->name('reports.class_teachers');
    Route::resource('/admin/reports', 'ReportsController');
    Route::get('/admin/contestants/failed', 'ContestantsController@disqualified')->name('contestants.disqualified');
    Route::get('/admin/contestants/approved', 'ContestantsController@approved')->name('contestants.approved');
    Route::resource('/admin/teachers', 'TeachersController');
    Route::resource('/admin/classes', 'ClassesController');
    Route::resource('/admin/students', 'StudentsController');
    Route::resource('/admin/contestants', 'ContestantsController');
    Route::get('/admin', 'AdminController@index')->name('admin');

    /**
     * Password Reset Route(S)
     */
    Route::get('admin/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('admin/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('admin/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('admin/password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

    /**
     * Email Verification Route(s)
     */
    Route::get('admin/email/verify', 'Auth\VerificationController@show')->name('verification.notice');
    Route::get('admin/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
    Route::get('admin/email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
});
Route::get('/live_results', 'LiveVotingController@candidates')->name('live_voting');
Route::post('admin/register', 'Auth\RegisterController@register');
Route::get('admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::resource('/register', 'CandidateController');
Route::post('/vote/cast', 'VotingController@cast')->name('vote.cast');
Route::get('/vote', 'VotingController@index')->name('vote.index');
Route::get('/try', function () {
    return view('trial');
});
Route::post('/vote/validate', 'VotingController@student_validate')->name('vote.validate');
//
Route::post('/register/check', 'CandidateController@check')->name('candidate_check');
//
Route::get('/apply', 'CandidateController@index')->name('register.index');
Route::get('403', function () {
    return view('errors.403');
})->name('error.403');


/**
 * Login Route(s)
 */
Route::get('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('admin/login', 'Auth\LoginController@login');
Route::post('admin/logout', 'Auth\LoginController@logout')->name('logout');
//Route::get('quotes','QuoteController@index')->name('quotes');
