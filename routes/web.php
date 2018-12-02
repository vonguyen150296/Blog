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
use App\Categorie;
use App\TypeDePubication;
use App\Publication;

Route::get('/', function () {
    return view('admin.heritage.index');
});
//admin

Route::get('admin/login','AuthController@getLogin')->name('getLogin');
Route::post('admin/login','AuthController@postLogin')->name('postLogin');
Route::get('admin/logout','AuthController@logout')->name('logout');

Route::group(['prefix'=>'admin','middleware'=>'adminMiddleware'],function(){

	Route::group(['prefix'=>'categorie'],function(){

		Route::get('liste','categorieController@liste')->name('categorieList');

		Route::get('ajouter','categorieController@getAjouter')->name('categorieGetAjouter');
		Route::post('ajouter','categorieController@postAjouter')->name('categoriePostAjouter');

		Route::get('modifier/{id}','categorieController@getModifier')->name('categorieGetModifier');
		Route::post('modifier/{id}','categorieController@postModifier')->name('categoriePostModifier');

		Route::get('supprimer/{id}','categorieController@supprimer')->name('categorieSupprimer');
	});

	Route::group(['prefix'=>'typeDePublication'],function(){

		Route::get('liste','typeDePublicationController@liste')->name('typeDePublicationList');

		Route::get('ajouter','typeDePublicationController@getAjouter')->name('typeDePublicationGetAjouter');
		Route::post('ajouter','typeDePublicationController@postAjouter')->name('typeDePublicationPostAjouter');

		Route::get('modifier/{id}','typeDePublicationController@getModifier')->name('typeDePublicationGetModifier');
		Route::post('modifier/{id}','typeDePublicationController@postModifier')->name('typeDePublicationPostModifier');

		Route::get('supprimer/{id}','typeDePublicationController@supprimer')->name('typeDePublicationSupprimer');

	});

	Route::group(['prefix'=>'publication'],function(){

		Route::get('liste','publicationController@liste')->name('publicationList');

		Route::get('ajouter','publicationController@getAjouter')->name('publicationGetAjouter');
		Route::post('ajouter','publicationController@postAjouter')->name('publicationPostAjouter');

		Route::get('modifier/{id}','publicationController@getModifier')->name('publicationGetModifier');
		Route::post('modifier/{id}','publicationController@postModifier')->name('publicationPostModifier');

		Route::get('supprimer/{id}','publicationController@supprimer')->name('publicationSupprimer');
		

	});

	Route::group(['prefix'=>'commentaire'],function(){
		Route::get('supprimer/{id}/{idPublication}','commentaireController@supprimer');
	});

	Route::group(['prefix'=>'users'],function(){

		Route::get('liste','usersController@liste')->name('usersList');

		Route::get('ajouter','usersController@getAjouter')->name('usersGetAjouter');
		Route::post('ajouter','usersController@postAjouter')->name('usersPostAjouter');

		Route::get('modifier/{id}','usersController@getModifier')->name('usersGetModifier');
		Route::post('modifier/{id}','usersController@postModifier')->name('usersPostModifier');

		Route::get('supprimer/{id}','usersController@supprimer')->name('usersSupprimer');
	});
});


Route::group(['prefix'=>'ajax'],function(){
	Route::get('typeDePublication/{id}','ajaxController@typeDePublication');
});
////utilisateur

Route::get('pageDaccueil','pagesController@pageDaccueil')->name('pageDaccueil');
Route::get('typeDePublication/{id}/{nomSansAccent}.php','pagesController@typeDePublication');
Route::get('publication/{id}/{nomSansAccent}.php','pagesController@publication');
Route::post('search','pagesController@search');
Route::get('contacte','pagesController@contacte');
Route::get('introduction','pagesController@introduction');

Route::get('login','usersController@getLogin');
Route::post('login','usersController@postLogin');
Route::get('logout','usersController@logout');
Route::get('users','usersController@gestion');
Route::post('users','usersController@postGestion');
Route::get('signUp','usersController@getSignUp');
Route::post('signUp','usersController@postSignUp');

Route::post('commenter/{id}','commentaireController@commenter');


