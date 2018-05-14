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


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id'     => '3',
        'redirect_uri'  => 'http://127.0.0.1:8000/oauth/callback',
        'response_type' => 'code',
        'scope'         => '',
    ]);

    return redirect('http://127.0.0.1:8000/oauth/authorize?' . $query);
})->name('redirect');

Route::get('/oauth/callback', function () {

    $http = new GuzzleHttp\Client;

    if (request('code')) {
        $response = $http->post('http://127.0.0.1:8000/oauth/token', [
            'form_params' => [
                'grant_type'    => 'authorization_code',
                'client_id'     => '3',
                'client_secret' => 'frTgCp46WJr7nA4fz46QRosVi6HowDzkArE2aZVO',
                'redirect_uri'  => 'http://127.0.0.1:8000/oauth/callback',
                'code'          => request('code'),
            ],
        ]);

        return json_decode((string)$response->getBody(), TRUE);
    } else {
        return response()->json(['error' => request('error')]);
    }
});

Route::get('/home', 'HomeController@index')->name('home');

// OWNER
Route::get('owner/index','OwnerController@index')->name('indexO');
Route::get('owner','OwnerController@create')->name('createO');
Route::post('owner','OwnerController@store')->name('addO');
Route::get('owner/{id}/edit','OwnerController@edit')->name('owner.edit');
Route::post('owner/{id}','OwnerController@update')->name('owner.update');
Route::get('owner/{id}/destroy',[
	'uses'=>'OwnerController@destroy',
	'as'  =>'owner.destroy'
]);
Route::post('/destroyO','OwnerController@destroy');

//PACKAGE
Route::get('package/index','PackageController@index')->name('package.index');
Route::get('package','PackageController@create')->name('package.create');
Route::post('package','PackageController@store')->name('package.store');
Route::get('package/{id}/edit','PackageController@edit')->name('package.edit');
Route::post('package/{id}','PackageController@update')->name('package.update');
Route::get('package/{id}/destroy',[
	'uses'=>'PackageController@destroy',
	'as'  =>'package.destroy'
]);

Route::POST('/destroyP','PackageController@destroy');  


//USER
Route::get('user/index','UserController@index')->name('user.index');
Route::get('user','UserController@create')->name('user.create');
Route::post('user','UserController@store')->name('user.store');
Route::get('user/{id}/edit','UserController@edit')->name('user.edit');
Route::post('user/{id}','UserController@update')->name('user.update');
Route::get('user/{id}/destroy',[
	'uses'=>'UserController@destroy',
	'as'  =>'user.destroy'
]);
Route::post('/destroyU','UserController@destroy');

//USE_OWNER
Route::get('userO/index','UserOwnerController@index')->name('userO.index');
Route::get('userO','UserOwnerController@create')->name('userO.create');
Route::post('userO','UserOwnerController@store')->name('userO.store');
Route::get('userO/{id}/edit','UserOwnerController@edit')->name('userO.edit');
Route::post('userO/{id}','UserOwnerController@update')->name('userO.update');
Route::get('userO/{id}/destroy',[
	'uses'=>'UserOwnerController@destroy',
	'as'  =>'userO.destroy'
]);
Route::post('/destroyUO','UserOwnerController@destroy');
///owner estados

Route::post('/Estado','OwnerController@Estados');
Route::get('/Estado/PRUEBA/{id}','OwnerController@PRUEBA');

Route::get('/settings', 'UserOutController@index')->name('Settings');
