Actions in a controller file
=============================

N.b. you may need to add created_at and updated_at columns to the database table for the post actions to work.

Index - display a listing of the reviews resource

```
public function index()
    {
        return ReviewCollection::collection(Review::paginate(20));
    }
    
```
    
Store - create a new review record

```
public function store(Request $request)
    {
        $reviews = new Review;
        $reviews->description= $request->description;
              $reviews->save();
  
        return response()->json([
          "message" => "review record created"
        ], 201);
    }
```

Show - display a review record by ID
```
 public function show(Review $review)
    {
        return new ReviewResource($review);
    }
```

Update - update a review record

```
public function update(Request $request, $id)
    {
        if (Review::where('id', $id)->exists()) {
            $review = Review::find($id);
    
            $review->description = is_null($request->description) ? $review->description : $request->description;
          
            $review->save();
    
            return response()->json([
              "message" => "records updated successfully"
            ], 200);
          } else {
            return response()->json([
              "message" => "review not found"
            ], 404);
          }
    }
  ```
  
  Destroy - delete a review record
  
  ```
   public function destroy(Product $product,Review $review)
    {
        $review->delete();
        return response(null,Response::HTTP_NO_CONTENT);
    }
    
    ```
    
    
    
    
