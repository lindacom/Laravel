Laravel shopping cart
=======================

Tutorial: Acemind - Laravel 5.2 PHP - Build a Shopping Cart
Shopping cart - https://www.youtube.com/playlist?list=PL55RiY5tL51qUXDyBqx0mKVOhLNFwwxvH

Set up the environment
------------------------
1. Download project repository
2. Change .env.example file to .env
3. Run the command php artisan key:generate to generate a key for your applicatio.

Set up the database tables
---------------------------
Users table:
id PrimaryIndex	int(11)  AUTO_INCREMENT	
username	varchar(100)
first_name	varchar(250)
name	varchar(100)
email	varchar(100)
password	varchar(250)
address	varchar(250)
postcode	varchar(250)
updated_at	date
created_at	date

books table:
id Primary	int(100) AUTO_INCREMENT
firstname	text
lastname	text
title	text	
price	decimal(30,2)
featured	varchar(25)
category	text
categoryId	int(11)
image	varchar(500)
imagePath	varchar(500)
precis	varchar(80)
description	text
summary	text	
product	text	
likes	int(11)	
dislikes	int(11)	
totallikes	int(11)

purchases table:
idPrimary	int(11)	AUTO_INCREMENT
user_id	int(11)
name	varchar(250)
cart	text	
address	varchar(250)
created_at	date
updated_at	date

category_product table (id, product_id, category_id, created_at, updated_at)

N.b. the whole of the cart will be entred into the cart field of the table as a long string so the type is therefore set to text.

Configure database settings
----------------------------
1. In the .env file enter database connection credentials.
2. In the config > database.php file set the default database connection and enter the database credentials
3. Run the command php artisan make:model Product -m 
4. In the new App > product file insert a protected fillable array
5. in the new database > migrations > create products table configure the schema for the new products table
6. Run the commad php artisan make:seed ProductTableSeeder
7. In the new database > seeds > producttableseeder file create the initial products for your project

```
 public function run()
    {
        $product = new \App\Product([
            'imagePath' => '',
            'title' => 'Harry otter',
            'description' => 'great book',
            'price' => 10
         ]);
         $product->save();
    }
```

8. In the database > seeds > DatabaseSeeder.php file specify that you want to run the ProductTableSeeder file
9. Run php artisan migrate
10. Run php artisan db:seed

Create the models
-------------------
1. Cart model - items are grouped in the item array
2. Product model - uses books table
3. Purchase model - one to one relationship - a purchase belongs to a user
4. User model - one to many relationship - a user has many purchases. One to one relationship - a user has one profile

Create the view pages
----------------------

user:
1. Profile - displays user's orders
2. Signin
3. signup - form input uses the post signup (store method) in the user controller file

shop:
1. checkout
2. index - main products page
3. shopping-cart
4. header

Create the controllers
----------------------

1. ProductController
2. userController

Create the routes
-----------------
Create url routes in the routes > web.php file.

/shop/index
/shoppingCart
/signup
/signin
/profile
/logout

used by buttons:

/add-to-cart/{id}
/increase/{id}
/reduce/{id}
/remove/{id}
/checkout

Used by forms:
/ordered
/upateaccount
