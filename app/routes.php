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


/*Route::get('/', function()
{
	//return View::make('users.index');
});
*/

Route::group(array('before'=> 'is_ip'),function(){





    Route::get('/', function(){

        if (Auth::check())
        {
            return View::make('layouts.home');
        }

        return View::make('login');
    });

    Route::group(array('before' =>'auth'),function(){

        Route::group(array('before' =>'is_admin'),function(){

            Route::get('/new/user',array('as' => 'new-user','uses' => 'UserController@create'));

            Route::post('/save/user',array('as' => 'create-user','uses' => 'UserController@save'));

            Route::get('/list/user', array('as' => 'prueba' , 'uses' => 'UserController@prueba'));

            Route::get('/edit/{id}', array('as'=>'edit-user','us' => 'home/edit' , 'uses' => 'UserController@edit'));

            Route::post('/update', array('as' => 'update-user' , 'uses' => 'UserController@update'));

            Route::get('user/destroy/{id}',array('as' => 'destroy', 'uses' => 'UserController@destroy' ));

            Route::get('user/change/{id}',array('as' => 'change', 'uses' => 'UserController@changePassword' ));

            Route::post('user/change/save',array('as' => 'save-change', 'uses' => 'UserController@savePassword' ));


            Route::get('new/product',array('as'=>'new-product','uses' => 'ProductController@create'));

            Route::post('save/product',array('as' => 'create-product','uses' =>'ProductController@save'));

            Route::get('list/products',array('as' => 'lista-product','uses' => 'ProductController@index'));

            Route::get('product/edit/{id}',array('as' =>'edit-product' ,'uses' =>'ProductController@edit'));

            Route::post('product/update',array('as' =>'update-product', 'uses' => 'ProductController@update'));

            Route::get('product/destroy/{id}',array('as'=>'destroy-products','uses' =>'ProductController@destroy'));

            Route::get('config',array('as'=>'config','uses' =>'ConfigController@index'));

            Route::post('config',array('as'=>'config-save','uses' =>'ConfigController@create'));






        });
        Route::get('/combo',array('as' =>'combo','uses' =>'InsuranceController@combo'));

        Route::get('autocomple',array('as' =>'autocomple','uses'=> 'CodigoController@index'));

        Route::get('insurace',array('as'=>'insurace','uses' =>'InsuranceController@index'));

        Route::post('new/insurace',array('as' =>'create-insurance','uses' =>'InsuranceController@create'));

        Route::get('/home',array('as' => 'home','uses'=>'HomeController@index'));

        Route::get('logout',array('us' =>'logout','uses' => 'AuthController@logOut'));

        Route::get('/profile/{id}',array('us'=> 'profile','as' =>'profile','uses' => 'UserController@profile'));

        Route::post('/profile/save',array('as' =>'save-profile','uses' => 'UserController@profileSave'));







    });




    Route::post('/authentication',array('as' =>'login','uses'=>'AuthController@postLogin'));




    /*App::error(function($exception, $code)
    {
        switch ($code)
        {
            case 403:
                return Response::view('errors.403', array(), 403);

            case 404:
                return Response::view('layouts.404', array(), 404);

            case 500:
                return Response::view('errors.500', array(), 500);

            default:
                return Response::view('errors.default', array(), $code);
        }
    });*/

});


Route::get('negation',function(){
    return View::make('layouts.negation');
});





