Laravel Scout 
=============

See documentation https://laravel.com/docs/7.x/scout

1. Install the package - composer require laravel/scout
2. Publish configuration files - php artison vendor:publish --provider="Laravel\Scout\ScoutServiceProvider". 
3. A config > scout.php file will then have been created in your directory where you can specify driver, queue and algolia configuration.

N.b. to use the Algolia driver you need to install the package - composer require algolia/algoliaSearch_client.php
N.b. You will also need an account.  See the website https://www.algolia.com/ once you create an account you will have three keys - app id, search-only ip key and admin api key.
N.b you have to send database records to algolia so that it can index, filter, rank etc. the records. e.g. php artisan scout:import 'App\Thread'
N.b. you can configure searchable attributes in algolia or using php artisan scout.

Enter the key information in the config > scout.php file in the algolia section. Also enter the key information in the .env file.

3. For any model that you want to be indexable use the searchable trait and use Laravel\Scout\Searchable at the top of the page.
