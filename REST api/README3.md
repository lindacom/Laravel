API planning
============
<li>Think about the audience</li>

Models
--------
<li> Think about the different models you will need. Looking at your data (in the database) think about the schema which 
defines all the fields that exist within a user record.</li>
 
<ol> id</ol>
<ol>username</ol>
<ol>first_name</ol>
<ol>name</ol>
<ol>email</ol>
<ol>password</ol>
<ol>address</ol>
<ol>postcode</ol>
<ol>updated_at</ol>
<ol>created_at</ol>

Queries and endpoints
---------------------
<li> think about is what routes we need</li>

 <li>Think about query parameters needed for each route e.g. users route</li>
 <ol>List users</ol>
 <ol>create a user</ol>
 <ol>retrieve a user</ol>
 <ol>update a user</ol>
 <ol>delete a user</ol>
 
<li>Think about endpoint queries</li>
Page (automatically available in Laravel for a resource collection)
http://localhost:8000/api/v1/user?page=2

Per page (only working for resource collection when specified in the controller return statement
as ->paginate(2))
http://localhost:8000/api/v1/user?per_page=2

All products, products by id, product revew by product id, product by orders
All customers, customer by id
All reviews, review by id, review by customer
All orders, order by id, order by product
Testing
--------
<li>Test CRUD actions in postman</li>

Secure the api
---------------

Reference
----------
query parameters used elsewhere:
Search (not working)
http://localhost:8000/api/v1/user?search=peter

Exclude specific id (not working)
http://localhost:8000/api/v1/user?exclude=1

Order ascending/descending (not working)
http://localhost:8000/api/v1/user?order=desc

order by object attribute e.g. name (not working)
http://localhost:8000/api/v1/user?orderby=name

roles - limit result set to users with specific role (not working)
http://localhost:8000/api/v1/user?role=admin
