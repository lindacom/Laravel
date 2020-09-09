Access collection with another collection
==========================================

->with('\App\Category');

Query parameter url 
====================
 <h3><a href="{{ route('product.categories', ['id' => $category->id]) }}">{{ $category->category }}</a></h3>
 
 results in http://example.com/laravel/public/shop/categories?id=1
