
<?php


use Illuminate\Http\Request;


Route::get('/Estado/{id}','OwnerController@Estados');


Route::get('/register','UserOutController@Register');

Route::get('/Login', 'UserOutController@login');

Route::group(['middleware' => 'auth:api'], function () use ($router) {

    Route::get('/profile', 'UserOutController@Profile');

});




/////////////////////////////////////////////////////////////////////////

