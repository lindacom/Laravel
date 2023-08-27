<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewCollection;
use App\Product;

use App\Review;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Front page
 * 
 *  APIs for front page
 */

class ReviewController extends Controller
{

 

   /* public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

      /**
   * Fetch reviews
   * 
   * Fetch all reviews.
   * 
   * @queryParam review review id to filter by Example: 5
   * 
   */
    public function index()
    {
        return ReviewCollection::collection(Review::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $reviews = new Review;
        $reviews->description = $request->description;
              $reviews->save();
  
        return response()->json([
          "message" => "review record created"
        ], 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reviews = new Review;
        $reviews->booktitle= $request->booktitle;
        $reviews->description= $request->description;
              $reviews->save();
  
        return response()->json([
          "message" => "review record created"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Review $review, $id)
    {
      return new ReviewResource($review);          

    }

    public function getProducts(Request $request, $id){
       return Review::findOrFail($id)->product;
      }

         /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        $review = tap($review)->update($request->all());
        return response([
            'data' => new ReviewResource($review)
        ], Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    
        
      public function update(Request $request, $id)
      {

  
        $review = Review::find($id);

        $review->description = $request->description;
        $review->fill(['description' => $request->description]);
        
        $review->save();

         /* $review->update($request->all());
          
          $review->save();
          return response([
              'data' => new ReviewResource($review)
          ],Response::HTTP_CREATED);
      }*/
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        $review->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
}