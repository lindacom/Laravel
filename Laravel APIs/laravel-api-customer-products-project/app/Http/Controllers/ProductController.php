<?php

namespace App\Http\Controllers;

//use App\Exceptions\ProductNotBelongsToUser;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\ReviewCollection;

use App\Product;

use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

  /*  public function __construct()
    {
        $this->middleware('auth:api')->except('index','show');
    }*/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ProductCollection::collection(Product::paginate(20));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product;
        $product->productName = $request->productName;
 
        $product->save();
        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function getReviews(Request $request, $id){
        return Product::findOrFail($id)->reviews;
      }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {  
         if (Product::where('id', $id)->exists()) {
            $product = Product::find($id);

            $input['price'] = $request->input('price');        
 
            $product->update($input);
    
          //  $product->productName = is_null($request->productName) ? $product->productName : $request->productName;
           // $product->price = is_null($request->price) ? $product->price : $request->price;
           
         //  $product->price = $request->price;
          // $Product->update($request->all());
           // $product->save();
    
            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "Product not found"
            ], 404);
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if (Product::where('id', $id)->exists()) {
      //  $this->ProductUserCheck($product);
      $product = Product::find($id);
        $product->delete();
        return response()->json([
            "message" => "record deleted"
          ], 200);
        }
    }

    public function ProductUserCheck()
    {
        if (Auth::id() !== $product->user_id) {
            throw new ProductNotBelongsToUser;
        }
    }
}