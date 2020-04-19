Laravel API documentation
==========================

The REST API provides an interface for applications to interact by sending and receiving data as JSON (JavaScript Object Notation) objects.

Routes & Endpoints (api.php)
-------------------

GET
POST

Requests and responses
-----------------------

Schema (user model)
-------------------
Each endpoint requires a particular structure of input data, and returns data using a defined and predictable structure. 
Those data structures are defined in the API Schema. Well-defined schema also provides one layer of security within the API, 
as it enables us to validate and sanitize the requests being made to the API. 

Controllers (user controller)
-------------------------------
Controller classes unify and coordinate all these various moving parts within a REST API response cycle. 
With a controller class you can manage the registration of routes & endpoints, handle requests, utilize schema, and generate API responses. A single class usually contains all of the logic for a given route, 
and a given route usually represents a specific type of data object 

Using the REST api
====================

Query parameters
----------------
REST API query parameters that apply to every endpoint

Users by id - api/user/1

Pagination and ordering parameters
-------------------------------------

Page - api/user?page=2

Link and embedding parameters
-----------------------------

discovery
----------

url for users to discover what the site is capable (avaoilable endpoits) of and how the site is configured.

Authentication
--------------
Cookie authentication is the standard authentication method When you log in this sets up the cookies correctly for you.

AJAX requests
--------------

Endpoint references
====================

User
-----
The REST API provides public data accessible to any client anonymously, as well as private data only available after authentication.
This API reference provides information on the specific endpoints available through the API,their parameters, and their response 
data format.

Resource:Users
Route:api/user

Query this endpoint to retrieve a collection of users. The response you receive can be controlled and filtered using the 
URL query parameters below.

The schema defines all the fields that exist within a user record. Any response from these endpoints 
can be expected to contain the fields below unless the `_filter` query parameter is used.

id - Unique identifier for the user. - context: view
username - user name for the user.
first_name - first name for the user.
name - name for the user.
email - The email address for the user.
password - not included
address
postcode
updated_at
created_at - Registration date for the user.
Roles - TO BE ADDED - Roles assigned to the user.

GET /api/user

TO BE DONE
page -Current page of the collection.
per_page - Maximum number of items to be returned in result set.
search - Limit results to those matching a string.
exclude - Ensure result set excludes specific IDs.
include - Limit result set to specific IDs.
offset - Offset the result set by a specific number of items.
order - Order sort attribute ascending or descending.
orderby - Sort collection by object attribute.
roles - Limit result set to users matching at least one specific role provided.

POST /api/user

PUT

DELETE


