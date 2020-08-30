Blade uses regular expressions

Custom blade directive
========================

You can register a new directive in the boot method of the app > providers > appserviceprovider file

at the top of the file use Blade;

e.g. a new directive called hello:

```
public function boot() {
Blade::directive('hello', function() {

});
}
```

then in the view file you now have access to the directive @hello

Cache
=====
Laravel cache's views in storage > framework > views.  If you are working in developmet and need to clear the
cache enter the command php artisan view:clear
