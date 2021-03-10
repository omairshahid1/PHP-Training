<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/crud', function () {
    return view('crud');
});

Route::post('/add', 'EmployeController@add')->name('add');   
 
Auth::routes();

Route::get('/chat', 'HomeController@index')->name('home');

Route::get('/admin', 'AdminController@show')->name('admin')->middleware('admincheck');
Route::get('/admin/addbook', 'AdminController@addbook')->name('addbook')->middleware('admincheck');
Route::post('/admin/create', 'AdminController@create')->name('create')->middleware('admincheck');
Route::post('/admin/update', 'AdminController@update')->name('update')->middleware('admincheck'); 
Route::get('/admin/book/edit/{id}', 'AdminController@edit')->name('edit')->middleware('admincheck');
Route::get('/admin/book/delete/{id}', 'AdminController@delete')->name('delete')->middleware('admincheck');
Route::post('/markread', 'HomeController@markread')->name('markread');
Route::post('/markfav', 'HomeController@markfav')->name('markfav');

Route::get('/groups', 'GroupController@index');
Route::get('/groups/get', 'GroupController@get');
Route::post('/groups/store', 'GroupController@store'); 
Route::post('/groups/getmessages', 'GroupController@getmessages'); 
Route::post('/group/sendmessage', 'GroupController@sendmessage'); 



Route::resource('conversations', 'ConversationController');

Route::get('/users', 'UserController@index'); 
Route::post('/messages', 'MessageController@index'); 
Route::post('/messages/send', 'MessageController@store'); 

// Route::get('/admin', 'AdminController@show')->name('admin')->middleware('admincheck');
// Route::get('/admin', 'AdminController@show')->name('admin')->middleware('admincheck');



Route::get('/pay', 'PayOrderController@store')->name('store');

