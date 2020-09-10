Laravel Vue installation
=========================

The Bootstrap and Vue scaffolding provided by Laravel is located in the laravel/ui Composer package, which may be installed using Composer:
```
composer require laravel/ui
```
Once the laravel/ui package has been installed, you may install the frontend scaffolding using the ui Artisan command:

```
// Generate basic scaffolding...
php artisan ui bootstrap
php artisan ui vue
php artisan ui react

// Generate login / registration scaffolding...
php artisan ui bootstrap --auth
php artisan ui vue --auth
php artisan ui react --auth

```

File structure
---------------
The resources > js > app.js file pulls in vue, loads the global vue component (called example). It also requires bootstrap.js file (that pulls in jquery, axios (for ajax requests)etc.)

The resources > assets > js > components > example.vue file is rferenced by the app.js file. A component file contains template, script and style.

see vuecasts.com for more information and tutorials.



