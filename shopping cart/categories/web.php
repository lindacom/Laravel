Route::get('/shop/categories',  [
    'uses' => 'ProductController@getCategories',
    'as' => 'product.categories'
    
]);
