<?php
namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{

    public function index(Tag $tag)
  // public function index()
    {    
// ERROR THIS IS SHOWING POST ID EQUALS TAG ID AND SHOULD BE SHOWING ALL POSTS BY TAG ID
        if ($tag->exists) {
            //here we don't get the posts yet
         //   $posts = $tag->posts()->latest();
            $posts->where('id', $tagname->id);
                  } else {
                    $posts = Post::latest();  
                  }
            
                  // url parameter is ?tag=tagname
                  if ($tagname = request('tag')) {                
            
                    // find tag name in tag table that equals tagname in url
                      $tagname = \App\Tag::where('name', $tagname)->firstOrFail();

                      // find posts where id equal id of tag column
                      $posts = Post::tag()->where('tag_id', $tagname);

                  
                  }
            
                  // here we get the posts according to which if statement is true
                  $posts = $posts->get(); 

                  return view('posts.index', 
                  [              'posts' => $posts          ]);

     /*   if ($tag->exists) {
            $posts = $tag->posts()->latest()->get();
        } else {
            $posts = Post::latest()->get();
           } 

           return view('posts.index', 
           [              'posts' => $posts          ]);*/

        // if the url has a tag query parameter
     /* if(request('tag'))  {
            $posts = Tag::where('name', request('tag'))->firstOrFail()->posts;
          
        } else {
         $posts = Post::latest()->get();
        } 

          return view('posts.index', 
        [              'posts' => $posts          ]);*/

  

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
        // N.b. when a post is created on this page the store method saves the post
           return view('posts.create', [
           'tags' => Tag::all() // return all tags to the view to be used in the form dropdown
           ]);
    }

  //  public function store(Request $Request)
  public function store()
   {   
$post = new Post($this->validatePost());
//$post->user_id = 1;
$post->save();
        $post->tags()->attach(request('tags')); // inserts article id an tag id into post_tag table
       
        return redirect('/posts');
     /*  $attributes = request()->validate([ 'body'=> 'required|max:255' ]);

        Post::create([
            'slug' => Request('slug'),
         'body' => $attributes['body']

        ]);
    
                        return redirect('/posts');
                        */
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
            'body' => 'required',
           // 'tag' => 'exists:tag,id'
        ]);
}

    
    }



