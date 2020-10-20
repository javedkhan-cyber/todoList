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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home')->middleware('checkStatus');
Route::resource('todo','TodoController')->middleware('checkStatus');
Route::get('get-user-for-task/{id}','TodoController@getUserForTask')->name('add.task')->middleware('checkStatus');
Route::post('add-task/{id}','TodoController@addTaskForUser')->name('task.store')->middleware('checkStatus');
Route::get('task-list','TodoController@listOfTask')->name('admin.task.list')->middleware('checkStatus');
Route::get('user-delete/{id}','TodoController@destroy')->name('todo.destroy')->middleware('checkStatus');
Route::get('user-edit/{id}','TodoController@edit')->name('edit.detail')->middleware('checkStatus');
Route::post('user-update','TodoController@update')->name('todo.update')->middleware('checkStatus');
Route::get('approve-user/{id}','TodoController@markAsComplete')->middleware('checkStatus');
Route::get('/', function () {
    return view('auth.login');
});