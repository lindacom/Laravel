Creating a user list using Vue.js as the frontend and Laravel as the backend.  Includes pagination, a user API endpoint and add, edit and 
delete functions.

Creating an application using Vue.js as the frontend and laravel as the backend
================================================================================

In a Laravel installation the package.json file contains the dependencies for vue.js.

app.js file
============
The resources > js > app.js file is the main vue file. It initiates vue.js.  The const app section of the file looks for an element in a
page that has the id of app (e.g. <div id="app">)

The app.js file bring in the example component from the component file however you can amend this to bring in other components that you 
create.

Homepage
=========

The homepage is located at resources > views > welcome.blade.php. Vue.js looks for a div in this page with the id of app.

A. Insert a div with the id of app into this page. 
B. You then put the name of the vue component in a div within the app div.

e.g.
<div id="app>
<articles></articles>
</div>

N.b. You can also wrap the above code in a bootstrap container for formatting. <div class="container">

C. At the end of the page insert a script referencing the app.js file

<script src=" {{ asset('js/app.js) }}"></script>

D. In the head section of the page include a meta tag and a script tag related to csrf token to prevent cross-site scripting

<meta name="csrf-token" content=" {{ csrf_token() }}">
<script>window.laravel= { csrfToken: ' {{ csrf_token() }} ' }

Vue components
==============

Create a vue file in the component folder and enter code within template tag. Then reference the component in the app.js file.
