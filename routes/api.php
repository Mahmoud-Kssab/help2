<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


////////////////////////// Api NameSpace //////////////////////
Route::group(['prefix' => 'v1', 'namespace'=>'Api'],function (){



    ////////////////////////// Adress NameSpace /////////////////////////
    Route::group(['namespace'=>'Address'],function (){

        ///////////// all governorates //////////////
        Route::get('governorates', 'AdressController@governorates');

        ///////////// all cities for governorate //////////////
        Route::get('cities/{id}', 'AdressController@cities');


    });

    ////////////////////////// Category NameSpace /////////////////////////
    Route::group(['prefix' => 'category', 'namespace'=>'Category'],function (){

        ///////////// all Parent Categories //////////////
        Route::get('parent_category', 'CategoryController@parentCategories');

        ///////////// all sub Categories //////////////
        Route::get('sub_category/{id}', 'CategoryController@subCategories');

    });


    Route::group(['middleware' => 'auth:sanctum'],function (){
        Route::group(['middleware' => 'auth'],function (){

            ////////////////////////// Message NameSpace /////////////////////////
            Route::group(['prefix' => 'chat', 'namespace'=>'Message'],function (){

                ///////////// chat in user //////////////
                Route::get('/{id}', 'MessageController@index');
                Route::post('send_message', 'MessageController@sendMessage');
                Route::post('users_chat', 'MessageController@usersChat');

            });


            ////////////////////////// Rate NameSpace /////////////////////////
            Route::group(['prefix' => 'rates', 'namespace'=>'Rate'],function (){

                //////////////// user rate ////////////////
                Route::get('show/{id}', 'RateContrller@show');
                Route::post('create', 'RateContrller@store');

            });
        });
    });


    ////////////////////////// User NameSpace /////////////////////////
    Route::group(['prefix' => 'user', 'namespace'=>'User'],function (){





        ////////////////// Authrisation //////////////////
        Route::post('register', 'AuthController@register');
        Route::post('login', 'AuthController@login');

        ////////////////////////// Client Sanctum ////////////
        Route::group(['middleware' => 'auth:sanctum'],function (){
            Route::group(['middleware' => 'auth'],function (){





                ////////////////////////// Client MiddleWare //////////////////////////
                Route::group(['prefix' => 'client', 'namespace'=>'Client'],function (){

                    ///////////// Works in client //////////////
                    Route::get('works', 'WorkController@index');
                    Route::post('work/create', 'WorkController@create');
                    Route::post('work/update/{id}', 'WorkController@update');
                    Route::get('work/show/{id}', 'WorkController@show');
                    Route::post('work/delete/{id}', 'WorkController@destroy');
                    Route::get('work/offers/{id}', 'WorkController@offers');


                });




                ////////////////////////// Worker MiddleWare //////////////////////////
                Route::group(['prefix' => 'worker', 'namespace'=>'Worker'],function (){

                    Route::group(['prefix' => 'offer'],function (){

                        ///////////// offer in worker //////////////
                        Route::get('/{id}', 'OfferController@index');
                        Route::post('create', 'OfferController@store')->name('store');
                        Route::get('show/{id}', 'OfferController@show')->name('show');
                        Route::post('update/{id}', 'OfferController@update')->name('update');
                        Route::delete('delete/{id}', 'OfferController@destroy')->name('destroy');

                    });


                    Route::group(['prefix' => 'works'],function (){

                        ///////////// Works in client //////////////////////
                        Route::get('/get_works', 'WorkController@get_works');
                        Route::get('show_works/{id}', 'WorkController@show_works');


                    });


                });



            });
        });
    });
});
