<?php
namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller



{

   public function index()
    {
      $tags = Tag::all();
    //  $data = 'this is a test';

    //  dd($data);
  //  return view('_tags-list', compact(['data']));
  //  return view('_tags-list', compact(['tags']));
       return view('_tags-list', 
        [              'tags' => $tags       ]);

    } 

   
    }



