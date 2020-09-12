Auth::routes();

/*
|--------------------------------------------------------------------------
| Shopping cart Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. 
|
*/

Route::get('/shop/index',  [
    'uses' => 'ProductController@getIndex',
    'as' => 'product.index'
    
]);

Route::get('/shop/categories',  [
    'uses' => 'ProductController@getCategories',
    'as' => 'product.categories'
    
]);

Route::get('/shop/categories/{category_id}', 'ProductController@getProductscat')->name('product.produtcat');



Route::get('/add-to-cart/{id}',  [
    'uses' => 'ProductController@getAddToCart',
    'as' => 'product.addToCart'
    
]);

Route::get('/increase/{id}',  [
    'uses' => 'ProductController@getIncreaseByOne',
    'as' => 'product.increaseByOne'
    
]);

Route::get('/reduce/{id}',  [
    'uses' => 'ProductController@getReduceByOne',
    'as' => 'product.reduceByOne'
    
]);

Route::get('/remove/{id}',  [
    'uses' => 'ProductController@getRemoveItem',
    'as' => 'product.remove'
    
]);



Route::get('/shoppingCart',  [
    'uses' => 'ProductController@getCart',
    'as' => 'product.shoppingCart'
    
]);

Route::get('/checkout',  [
    'uses' => 'ProductController@getCheckout',
    'as' => 'checkout',
    'middleware' => 'auth'
    
]);

Route::post('/ordered',  [
    'uses' => 'ProductController@postCheckout',
    'as' => 'ordered',
    'middleware' => 'auth'
    
]);



Route::post('/upateaccount', [
    'uses' => 'UserController@postSaveAccount',
    'as' => 'account.save'
]);


Route::group(['prefix' => 'user'], function() {
  Route::group(['middleware' => 'guest'], function() {

Route::get('/signup',  [
    'uses' => 'UserController@getSignup',
    'as' => 'user.signup'
    
]);

Route::post('/signup',  [
    'uses' => 'UserController@postSignup',
    'as' => 'user.signup'
    
]);

Route::get('/signin',  [
    'uses' => 'UserController@getSignin',
    'as' => 'user.signin'
    
]);

Route::post('/signin',  [
    'uses' => 'UserController@postSignin',
    'as' => 'user.signin'
    
]);


});



Route::group(['middleware' => 'auth'], function() {

Route::get('/profile',  [
    'uses' => 'UserController@getProfile',
    'as' => 'user.profile'   
]);

Route::get('/logout',  [
    'uses' => 'UserController@getLogout',
    'as' => 'user.logout'   
]);

 });
  });
