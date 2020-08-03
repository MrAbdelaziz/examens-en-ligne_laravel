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
Route::get('/', ['as'=>'home_path','uses'=>'PublicController@index']);
Route::get('/contact', 'PublicController@contact')->name('contact');
Route::get('/about', 'PublicController@about')->name('about');
Route::get('/category', 'PublicController@categories')->name('categories');
Route::get('/exam', 'PublicController@categories')->name('exams');
Route::get('/search', 'PublicController@search')->name('search');
Route::get('/category/{id}', 'PublicController@category')->name('category');
Route::get('/exam/{id}', 'PublicController@exampage')->name('exam');
Route::post('/exam/{id}/pass/{user}', 'PublicController@pass')->name('passexam');
Route::post('/exam/{id}/pass/{user}/send', 'PublicController@send')->name('sendpass');
Route::post('/exam/{id}/register/{user}', 'PublicController@registertoexam')->name('registertoexam');

Auth::routes();
Route::group(['middleware'=>'auth', 'prefix'=>'dashboard',], function () {
	/*-> Dashboard <-*/
	Route::get('/', 'HomeController@index')->name('home');

	/*-> Users <-*/
	Route::pattern('role', 'administrators|supervisors|authors|members');
	Route::get('user/{role}', 'UserController@index')->name('user.role');
	Route::post('user/activate', 'UserController@activate')->name('user.activate');
	Route::post('user/deactivate', 'UserController@deactivate')->name('user.deactivate');
	Route::resource('user', 'UserController', ['except' => ['show']]);

	/*-> Categories <-*/
	Route::resource('category', 'CategoryController', ['except' => ['show']]);
	Route::resource('subcategory', 'SubcategoryController', ['except' => ['show']]);

	/*-> Exams <-*/
	Route::resource('exam', 'ExamController', ['except' => ['show']]);
	Route::post('exam/create/step2', 'ExamController@create_2')->name('exam.step2');
	Route::post('exam/create/step3', 'ExamController@create_3')->name('exam.step3');
	Route::post('exam/activate', 'ExamController@activate')->name('exam.activate');
	Route::post('exam/deactivate', 'ExamController@deactivate')->name('exam.deactivate');

	/*-> Inscriptions <-*/
	Route::post('inscription/accept', 'InscriptionController@accept')->name('inscription.accept');
	Route::post('inscription/reject', 'InscriptionController@reject')->name('inscription.reject');
	Route::resource('inscription', 'InscriptionController', ['except' => ['show']]);

	/*-> Certifications <-*/
	Route::post('certification/accept', 'CertificationController@accept')->name('certification.accept');
	Route::post('certification/reject', 'CertificationController@reject')->name('certification.reject');
	Route::resource('certification', 'CertificationController', ['except' => ['show']]);
	
	/*-> Settins <-*/
	Route::get('setting', 'SettingController@create')->name('setting.index');
	Route::post('setting', 'SettingController@create')->name('setting.index');

	/*-> Profiles <-*/
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'ProfileController@password']);
});
