Service container
=================
Creating a service container
------------------------------

A service container is a place to store and retrieve services.  A service can be string, object, collection.

To create a service container write

new \App\container()

The method contains a function to bind the key and value.

Laravel's built in service container
-------------------------------------
Laravel's service container is the app itself - App

The config > services.php file contains the settings and keys for the appliction.

To fetch configuration settins in the bind fnction in the route or method file enter key name e.g.

$foo = config('services.foo');

Service providers
=================

A service provider provides a service to the framework e.g. registering keys to the service container, trigger functionality etc.

The frameork folder is divided into components (folders) and each component has a service provider (file).

A service provider can implemet two methods - register and boot.

The config > app.php file lists all service providers.

Steps:

1. The framework loops through the list of service providers in the app.php file and registers them
2. Once all providers are registered the boot method is triggered on each service
