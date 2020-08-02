<?php
namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller



{

   public function index()
    {
        $posts = Post::latest()->get();
// dd($post); dump and die prints to screen for testing purposes

if(! $posts) {
    abort(404);
}
          return view('posts.index', 
        [              'posts' => $posts          ]);
    } 


    public function show($id)
    {
        $post = Post::findOrFail($id);
// dd($post); dump and die prints to screen for testing purposes

if(! $post) {
    abort(404);
}

    // get previous post id
    $previous = Post::where('id', '<', $post->id)->max('id');

    // get next post id
    $next = Post::where('id', '>', $post->id)->min('id');

    return view('posts.show', [
        'post' => $post
    ])->with('previous', $previous)->with('next', $next);
        /*  return view('posts.show', [
              'post' => $post
          ]);*/
    }



 public function create()
    {
        // when a post is created on this page the store method saves the post
           return view('posts.create');
    }

    public function store(Request $Request)
    {   

       $attributes = request()->validate([ 'body'=> 'required|max:255' ]);

        Post::create([
            'slug' => Request('slug'),
         'body' => $attributes['body']

        ]);
    
                   return redirect('/posts');
    }

 public function edit($id)
    {
        $post = Post::findOrFail($id);
// dd($post); dump and die prints to screen for testing purposes

if(! $post) {
    abort(404);
}
          return view('posts.edit', [
              'post' => $post
          ]);
    }

    public function update($id)
    {
         
        $post = Post::findOrFail($id);

          
        $post->slug = request('slug');
        $post->body = request('body');

         $post->save();

         return redirect('/posts/'.$post->id);

    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
// dd($post); dump and die prints to screen for testing purposes

if(! $post) {
    abort(404);
}
          return view('posts.delete', [
              'post' => $post
          ]);
    }

    public function destroy($id)
    {
        // delete
        $post = Post::find($id);
        $post->delete();

        // redirect
       // Session::flash('message', 'Successfully deleted the post!');
       return redirect('/posts');
    }

     // reusable field validation

protected function validatePost() {
         return request()->validate ([
            'slug' => 'required',
            'body' => 'required'
        ]);
}

    
    }



