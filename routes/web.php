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

/*Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
*/

$idPattern = '[0-9]+';

########### Project Manager ###########################################
Route::get("/","ProjectController@index")->name('projects.index');

Route::get("project/index","ProjectController@index")->name('projects.index');

Route::get("project/add","ProjectController@add")->name('projects.add');
Route::post("project/store","ProjectController@store")->name('projects.store');

Route::get("project/edit/{id}","ProjectController@edit")->name('projects.edit')->where('id', $idPattern);
Route::put("project/update/{id}","ProjectController@update")->name('projects.update')->where('id', $idPattern);

Route::delete("project/delete/{id}","ProjectController@delete")->name('projects.delete')->where('id', $idPattern);


################# Dictionnaire

Route::get("dictionnaire/add/{id_project}","DictionnaireController@add")->name('dictionnaires.add');
Route::post("dictionnaire/store","DictionnaireController@store")->name('dictionnaires.store');

Route::get("dictionnaire/edit/{id}","DictionnaireController@edit")->name('dictionnaires.edit');
Route::put("dictionnaire/update/{id}","DictionnaireController@update")->name('dictionnaires.update');

Route::delete("dictionnaire/delete/{id}","DictionnaireController@delete")->name('dictionnaires.delete');


################# Language

Route::get("language/add/{id_dictionnaire}","LanguageController@add")->name('languages.add');
Route::post("language/store","LanguageController@store")->name('languages.store');

Route::get("language/edit/{id}","LanguageController@edit")->name('languages.edit');
Route::put("language/update/{id}","LanguageController@update")->name('languages.update');

Route::delete("language/delete/{id}","LanguageController@delete")->name('languages.delete');

Route::get("language/template/{id}","LanguageController@template")->name('languages.template');
Route::get("language/export/{id}","LanguageController@export")->name('languages.export');



################## Words

Route::get("word/add/{id_dictionnaire}","WordController@add")->name('words.add');
Route::post("word/store","WordController@store")->name('words.store');


################### Key

Route::get("key/edit/{id}","KeyController@edit")->name('keys.edit');
Route::put("key/update/{id}","KeyController@update")->name('keys.update');

Route::delete("key/delete/{id}","KeyController@delete")->name('keys.delete');
