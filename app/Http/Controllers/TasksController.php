<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    function index()
    {
    	$tasks = Task::all();
    	return view('tasks.index',compact('tasks'));
    }

    // function show($id)
    // {
    // 	$task = Task::findOrFail($id);
    // 	return view('tasks.show',compact('task'));
    // }
     function show(Task $task)
    {
    	return view('tasks.show',compact('task'));
    }
}
