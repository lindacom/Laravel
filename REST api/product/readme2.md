Actions in a controller file
=============================

Index - display a listing of the resource

```
public function index()
    {
        return ReviewCollection::collection(Review::paginate(20));
    }
    ```
    
    
