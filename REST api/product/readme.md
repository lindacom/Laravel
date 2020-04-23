urls to test (check url errors errors and CRUD in postman)
=============

http://localhost:8000/api/products - cannot reference variable name mor than once

http://localhost:8000/api/products/2 - cannot reference variable name mor than once

http://localhost:8000/api/v1/products/2/reviews- route product.show not defined

http://localhost:8000/api/v1/products/3/orders - products.show not defined

http://localhost:8000/api/v1/reviews

http://localhost:8000/api/v1/customer

http://localhost:8000/api/v1/orders
http://localhost:8000/api/v1/orders/2 - not filtering by order number
http://localhost:8000/api/v1/orders/2/products - cannot reference variable name order more than once

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
