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

/******************/
/** AUTHENTICATION ROUTE ***/
/******************/

Route::namespace('Auth')->group(function (){
    Route::get('/login','LoginController@showLoginForm')->name('login');
    Route::post('/login','LoginController@login');
    Route::post('/logout','LoginController@logout')->name('logout');
    Route::post('/password/email','ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('/password/reset','ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('/password/reset','ResetPasswordController@reset');
    Route::get('/password/reset/{token}','ResetPasswordController@showResetForm')->name('password.reset');
});

/******************/
/** GUEST ROUTE ***/
/******************/


Route::namespace('Guest')->group(function (){

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/p/{slug}.html', 'GuestController@postDetail')->name('post');

    Route::get('/c/gioi-thieu', 'GuestController@postIntro')->name('postIntro');
    Route::get('/c/lien-he', 'GuestController@postContact')->name('postContact');
    Route::get('/c/{type}', 'GuestController@listPost')->name('listPost');

});


/******************/
/** ADMINISTRATION ROUTE ***/
/******************/

Route::namespace('Admin')->middleware(['auth'])->prefix('admin')->group(function (){
    Route::get('/', function (){
        return redirect()->route('dashboard');
    });
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    Route::post('show-home-page/{id}','DashboardController@showHomePage')->name('showHomePage');

    /*** Post route ***/
    Route::resource('news','PostController');
    Route::resource('contacts','ContactController')->except(['edit']);
    Route::resource('partner','PartnerController');
    Route::resource('intro','IntroduceController')->except(['edit']);
    Route::resource('project','ProjectController');
    Route::resource('recruitment','RecruitmentController');
    Route::resource('service','ServiceController');
    Route::resource('slide','SlideController')->except(['show','edit','create','destroy']);

    /*** End Post route ***/
    Route::get('/info','InfoController@index')->name('info');
    Route::post('/info','InfoController@update')->name('info');

    Route::get('/footer','FooterController@index')->name('footer');
    Route::get('/contact','ContactController@index')->name('contact');
});



