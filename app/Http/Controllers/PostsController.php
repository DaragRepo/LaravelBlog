<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index','show']);
    }

    function index()
    {
       $manyPosts = true;

        if (!empty(request(['month','year']))) {
           $posts = Post::latest() 
           ->filter(request()->only(['month', 'year']))
           ->get();
       } else {
         $posts = Post::latest()->get(); 
       }
        // $archives = App\Post::selectRaw('year(created_at) year, monthname(created_at) month, cou
        //     nt(*) published')->groupBy('year', 'month')->get();
    	// $posts = Post::orderBy('created_at','asc')->get();

       return view('posts.index', compact('posts','manyPosts'));
   }

   function show(Post $post)
   {
       $manyPosts = false;
       return view('posts.show', compact('post','manyPosts'));
   }

   function create()
   {
       return view('posts.create');
   }

   function store()
   {
    	// dd(request()->all());
    	// dd(request('body'));
    	// dd(request(['title','body']));
    	// $post = new Post;

    	// $post->title = request('title');
    	// $post->body = request('body');

    	// $post->save();

    	// Post::create([

    	// 	'title' => request('title'),

    	// 	'body' => request('body')
    	// ]);
       $this->validate(request(), [
    		// 'title' => 'required|max:10'
          'title' => 'required',
          'body' => 'required'
      ]);

        // auth()->user()->publish(

        // new Post(request(['title','body']))

        // );


       Post::create([

        'title' => request('title'),

        'body' => request('body'),

            'user_id' =>   auth()->id()    //auth()->user()->id
        ]); // preferable
    	// Post::create(request()->all());

       return redirect('/');

   }
}
