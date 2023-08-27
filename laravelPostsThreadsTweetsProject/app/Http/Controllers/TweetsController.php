<?php
namespace App\Http\Controllers;
use App\User;
use App\Tweet;
use Illuminate\Http\Request;

class TweetsController extends Controller



{

   public function index()
    {
       return view('news', 
       [              'tweets' => auth()->user()->timeline()
                ]);

   
        /*  return view('news', 
        [              'tweets' => Tweet::all()          ]);*/

    } 


    public function store(Request $Request)
    {   

       $attributes = request()->validate([ 'body'=> 'required|max:255' ]);

        Tweet::create([
         'body' => $attributes['body']

        ]);
    
                   return redirect('/news');
    }

    
    }



