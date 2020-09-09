N.b. in Laravel when you return an array it automatially returns a json response.

Axio is an alternative library to jquery. Axios is recommended over the older vue-resource.

Ajax request
=============
1. You can use CDN to pull in axios.  In the script at the bottom of the view file add link to the vue.js cdn (see axios on github)
2. In the web.php file create a route

```
Route::get('skills', function() {
  return ['laravel', 'vue', 'php']
  });
```
  
3. In the app.js file make a get request to an endpoint

```
mounted() {
axios.get('/skills').then(response =>console.log(respose));
}
```

N.b. this is a promise based so you need to wait for a respose(i.e. then)

4. In the view file echo the array

<li v-for='skill in skills'>@{{ skill }}</li>

N.b. use the @ symbol to lt blade know that vue wil handle the command or alternatively use v-text='skill' and remove the directie between the li tags.
