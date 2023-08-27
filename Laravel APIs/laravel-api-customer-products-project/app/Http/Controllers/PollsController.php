<?php

namespace App\Http\Controllers;
use App\Poll;
use App\Http\Resources\Poll as PollResource;
use Illuminate\Http\Request;
use Validator;

class PollsController extends Controller
{
    public function index() {
      //  return response()->json(Poll::get(), 200);

      // add pagination
      return response()->json(Poll::paginate(), 200);
    }

    public function show($id) {
       // return response()->json(Poll::find($id), 200);


       $poll = Poll::with('questions')->findOrFail($id);
       $response['poll'] = $poll;
       $response['questions'] = $poll->questions; 
        return response()->json($response, 200);
     /*  $poll = Poll::find($id);
       
       if (is_null($poll)) {
          return response()->json(null, 404);
         } */
     //  return response()->json(Poll::findOrFail($id), 200);

    // $response = new PollResource(Poll::findOrFail($id), 200);

 
    }

    public function store(Request $request) {

        $rules = [
            'title' => 'required|max:10',
        ];
        
        $validator = validator::make($request->all(), $rules);
         
        if($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        // refers to request object on line 6
         $poll = Poll::create($request->all());
        // 201 request created a new resource
        return response()->json($poll, 201);
    }

    public function update(Request $request, Poll $poll) {
       $poll->update($request->all());
       return response()->json($poll, 200);
    }

    public function delete(Request $request, Poll $poll) {
        $poll->delete();
        return response()->json(null, 204);
     }

     public function errors() {
        
        return response()->json(['msg' => 'payment is required'], 501);
     }

     public function questions(request $request, Poll $poll) {
        
        // sub resources from poll method - relationships in the model
        $questions = $poll->questions;
        return response()->json($questions, 200);
     }
}
