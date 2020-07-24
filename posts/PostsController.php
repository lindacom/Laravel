<?php
namespace App\Http\Controllers;


class PostsController extends Controller



{
    public function show($slug)
    {
        $post = \DB::table('posts')->where('slug', $slug)->first();
// dd($post); dump and die prints to screen for testing purposes
          return view('post', [
              'post' => $post
          ]);
    }

}



