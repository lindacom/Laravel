Install Laravel and Redis
=========================

Redis is an in memory key value store

Create a project
------------------

1. Create a laravel project - larvel new <name>
2. Create a laravel application key - php artisan key:generate

N.b. Redis fascade is already available in Laravel. 

3. In the .env file set cache driver to redis

N.b. Redis driver is already available for caching (see config > cache file. leave this cache driver setting as file)

Redis requires predis dependency which can be pulled in from composer

Install Redis
-------------

1. Install predis - composer require predis/predis
2. Download Redis software (search online for the link) to your computer and open the redis-server.exe file
3. In the terminal install redis cli - npm install -g redis-cli
4. Open redis cli - enter rdcli in the terminal
5. In the routes > web.php file 

use Redis fascade at the top of the page 

```
use Illuminate\Support\Fascades\Redis;
```
and in the route function write 

```
Route::get('/', function () {

  Redis::set('name', 'mary');
return Redis::get('name');
    });
    
```

N.b. if you have a class redis ot found error comet out the redis line in the aliases section of the config > app.php file


