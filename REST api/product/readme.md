This API uses the products table, the customer table, the reviews table and the orders table. 
The routes are entred in the routes > api.php file.
The routes direct to the app > http > controller files.
The controler uses the app > http model and directs to the resources file.
The resources file returs the JSON array of database data.

Steps
======
1. Create a model - uses namespace app\model and app\model\product, uses illuminate\database\eloquent\model, enter a class name(the same as the filename) that extends model, enter protected fields array, enter a public function.

Nb. the plural of the class name will be used as the table name unless protected name tabe is specified in the model.

2. Create a resource file - database fields to be returned from a GET request. Uses resources and JSON resources, enter a class name (the same as the file name) that extends resource.

3. Create a controller - which conains the index and CRUD functions. Uses models, resources, requests ad responses. Enter a class name.

4. Create routes

Actions
========
Action are defined in the controller file as methods.

Index function shows the index 
Store function creates a record (not sure if it is store or create)
Show function shows by id
Update function updates a record (not sure if it is edit or update)
Destroy function deletes a record

Requests - urls to test (check url errors and CRUD actions in postman)
========================
Products 
---------
All products
http://localhost:8000/api/products 
Product by ID
http://localhost:8000/api/products/2 
Product reviews by product id
http://localhost:8000/api/v1/products/2/reviews
product by orders
http://localhost:8000/api/v1/products/3/orders 

Customers
----------
All customers
http://localhost:8000/api/v1/customer
Customer by ID
http://localhost:8000/api/v1/customer/2
Customer reviews
http://localhost:8000/api/v1/customer/2/reviews
Customer orders
http://localhost:8000/api/v1/customer/2/orders

Reviews
--------
All reviews
http://localhost:8000/api/v1/reviews
Review by ID
http://localhost:8000/api/v1/reviews/2
Reviews by customer ID
http://localhost:8000/api/v1/reviews/customer/3
Reviews by product ID
http://localhost:8000/api/v1/reviews/product/3

Orders
-------
All orders
http://localhost:8000/api/v1/orders
Orders by ID
http://localhost:8000/api/v1/orders/2 
Orders by product
http://localhost:8000/api/v1/orders/products/1 

Resources
=========
app > http > resources > product > ProductCollection - returns an array of the database columns and data (e. 'id' => $this.id). A collection contains links such as pagination and links to other resources

app > http > resources > product > ProductResource - returns results in key and value format for each item in the array entered in the return array of the function in the product collection file.  This resource can be access by clicking on the individual links in the product collection api response. A link is creatd by entering

```
'link' => route ('products.show', $this->id)

```

app > http > resources > RviewResource - returns an array o database columns and data for reviews that match the (request) product id entered in the url

Databases
==========
Product
--------
productName
image
price
id

Review
-------
customerid
booktitle
description
likes
id
product_id

Customer
--------
customerName
id
DateOfBirth
registered
Email
password

Orders
------
Customerid
orderDate
productid
quantity
price
total


Troubleshooting
================

To fix the error the Response content must be a string or object implementing __toString(), "boolean" given means there may be some characters in 
the database that some character that json can't encode.  To fix this enter in the model e.g.

```
protected $hidden = array(
        'password',
        'remember_token',
        'deleted_at',
        'created_at',
        'updated_at'
	);
  ```
Incorrect database table - by default the plural of a classname will be used as the table nam unless a protected tabl name is specified in the model e.g

```
class Customer extends Model
{

	 protected $table = 'CUSTOMER';
	 ```
