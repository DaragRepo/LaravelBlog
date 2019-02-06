<?php

use App\Task;

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

Route::get('/', 'PostsController@index')->name('home');

Route::get('posts/create', 'PostsController@create');

Route::post('posts','PostsController@store');

Route::get('posts/{post}', 'PostsController@show');


Route::get('posts/tags/{tag}', 'TagsController@index');



Route::post('posts/{post}/comments','CommentsController@store');


Route::get('register', 'RegistrationController@create');

Route::post('register', 'RegistrationController@store');


Route::get('login', 'SessionsController@create');

Route::post('login', 'SessionsController@store');

Route::get('logout', 'SessionsController@destroy');

// Route::get('tasks', 'TasksController@index');
// Route::get('task/{task}', 'TasksController@show');
// Route::get('tasks', function () {
// 	// $tasks = [
// 	// 	'study toefl',
// 	// 	'study laravel',
// 	// 	'make user guide for moodle',
// 	// 	'fix java code and upload it'
// 	// ];
// 	// $tasks = DB::table('tasks')->get();
// 	// $tasks = DB::table('tasks')->where('id','<',4)->get();
// 	// $tasks = DB::table('tasks')->latest()->get();
// 	$tasks = Task::all();
// 	// return $tasks; // will return json by default
// 	// return view('welcome',compact('tasks'));
// 	return view('tasks.index',compact('tasks'));
// 	// $name = 'Darag';
// 	// $age = 22;
// 	// return view('welcome',compact('name'));
// 	// return view('welcome',compact('name','age'));
// 	// return view('welcome')->withName($name);
//     // return view('welcome', [
//     // 	'name' => 'Laracasts'

//     // ]); 
//      // return view('welcome')->with('name','World');
//      // return view('welcome')->withName('World');
// });

// Route::get('task/{id}', function($id){
// 	// $task = DB::table('tasks')->where('id','=',$id)->get();
// 	// $task = DB::table('tasks')->find($id);
// 	$task = Task::findOrFail($id);
// 	// dd($task);
// 	return view('tasks.show',compact('task'));
// 	// return $task;
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
