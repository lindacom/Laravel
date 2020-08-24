Redis
=======
You can use redis instead of an sql query as it is faster and offers different options.  Redis set up is included in the laravel installation however you will
need to download the service and extension in order to use redis in your project.

Installing redis
----------------
1. Install redis service https://github.com/microsoftarchive/redis/releases/tag/win-3.2.100 and extract the zip file to the directory of the project.
2. Download the PECL extension (dll) folder to the php > ext directory. (N.b choose NTS or TS according to Thread Safety settings in phpinfo() 
and place the dll file in the php > ext directory) - NTS
3. Add the extension to the list of extensions in the php info file (extension=php_redis.dll)
4. In visual studio code install redic from the commandline (composer require predis/predis)
5. In the redis service folder run the redis-server executable file. Ensure the server is running on the correct port 6379. (You will see the message that 
the server is now read to accept connections)
In visual studio code run php artisan serve and access the webpage that is using redis.
