<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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



Route::get('/cities', 'Front\CityController@city')->name('profile');

Auth::routes();


Route::group(['namespace' => 'Front'], function ()
{
  Route::get('/', 'MainController@home')->name('front.home');
  Route::get('/ratings', 'MainController@ratings')->name('ratings');

  Route::get('/contact', 'MainController@contact')->name('contact');
  Route::post('user/contact', 'MainController@contact_send')->name('user.contact');

  Route::get('/profile', 'MainController@profile')->name('profile');





});



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::group(['namespace' => 'Admin', 'prefix'=>'admin'], function (){

    Route::get('login', 'Auth\AuthController@login')->name('admin-login');
    Route::post('login-check', 'Auth\AuthController@loginCheck')->name('login-check');

    Route::group(['middleware' => 'auth:admin'], function(){




        Route::group(['namespace' => 'Auth'], function (){
            Route::get('changepassword', 'ChangePasswordController@index')->name('changepassword.index');
            Route::post('changepassword/update', 'ChangePasswordController@update')->name('updatepassword');

            Route::get('logout', 'AuthController@logout')->name('admin.logout');

            Route::resource('roles','RoleController');
            Route::resource('admin','AdminController');

        });

        Route::group(['namespace' => 'Main'], function (){

            Route::get('/home','MainController@index')->name('admin.home');                          ////////// governorate route -r
            Route::get('/message','MessageController@index')->name('message.index');                          ////////// governorate route -r
            Route::resource('/governorate','GovernorateController');                          ////////// governorate route -r
            Route::resource('/city','CityController');                                        ////////// city route -r
            Route::resource('/category','CategoryController');                                ////////// category route -r
            Route::resource('/user','UserController');                                        ////////// user route -r
            Route::resource('/work','WorkController');                                        ////////// work route -r
            Route::get('/work_offers/{id}','WorkController@workOffers')->name('work_offers');      ////////// work offers route
            Route::get('/worker','UserController@worker')->name('user.worker');               ////////// worker route



            Route::resource('/settings','SettingController');                                             ////////// srtting route
            Route::get('/contacts','SettingController@contacts')->name('admin.contacts');               ////////// worker route

            Route::get('/activate{id}','UserController@activate')->name('user.activate');
            Route::get('/deactivate{id}','UserController@deactivate')->name('user.deactivate');
            Route::get('work/activate/{id}','WorkController@activate')->name('work.activate');
            Route::get('work/deactivate/{id}','WorkController@deactivate')->name('work.deactivate');



        });
    });
});



Route::group(['namespace' => 'Front'], function (){
    Route::get('sub', 'Client\WorkController@getjson');

    ////////////////////////////// Message Groupe /////////////////////////////////
    Route::group(['namespace' => 'Main', 'middleware' => 'auth:web' ], function (){

        Route::get('/chat/{id}', 'MessageController@index')->name('chat.index');
        Route::get('/get_messages/{id}', 'MessageController@getMessages')->name('get_messages');
        Route::post('/chat/create', 'MessageController@create')->name('chat.create');

    });


    ///////////////////////// Worker Groupe in Front ////////////////////////
    Route::group(['namespace' => 'Worker',  'prefix'=>'worker'], function (){

        Route::resource('works', 'WorkController');
        Route::resource('offer', 'OfferController');

    });


    ///////////////////////// Client Groupe in Front ////////////////////////
    Route::group(['namespace' => 'Client',  'prefix'=>'client'], function (){


        Route::get('work-activate/{id}', 'WorkController@showwork')->name('client-work.activate');
        Route::get('work-deactivate/{id}', 'WorkController@hidework')->name('client-work.deactivate');

        Route::group(['middleware' => 'auth:web'], function (){


            Route::get('/profile', 'MainController@profile')->name('profile');
            Route::get('/addwork', 'WorkController@create')->name('addwork');
            Route::post('/addwork/create', 'WorkController@store')->name('addwork.store');
            Route::delete('/addwork/delete', 'WorkController@destroy')->name('workclient.destroy');
            Route::get('addwork/edit/{id}', 'WorkController@edit')->name('workclient.edit');
            Route::post('addwork/update/{id}', 'WorkController@update')->name('workclient.update');
            Route::get('/offeruser/{id}', 'WorkController@offeruser')->name('offeruser');


        });
    });






});

Route::group(['middleware' => 'auth:web'], function (){

    Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
});





  View::composer(['*'],function($view){
    $setting=App\Models\Setting::first();
    $view->with('setting',$setting);
  });
Route::get('/{page}',[App\Http\Controllers\AdminController::class, 'index']);

Route::get('login/twiiter', 'Auth\LoginController@redirectToProvider');

Route::get('login/twiiter/callback', 'Auth\LoginController@handleProviderCallback');


