<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use DataTables;

class Full_text_search_Controller extends Controller
{
  function index()
    {
     return view('posts.index');
    } 

    function action(Request $request)
    {
     if($request->ajax())
     {
      $data = Post::search($request->get('full_text_search_query'))->get();

  return response()->json($data);
     }
    }

  /* function normal_search(Request $request)
    {
        if($request->ajax())
        {
            $data = Post::latest()->get();
            return Datatables::of($data)->make(true);
        }
      
        return view('posts.index');
    }*/
}