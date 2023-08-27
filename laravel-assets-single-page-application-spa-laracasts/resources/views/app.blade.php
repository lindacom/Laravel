<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
      
        </head>
    <body>
       <div id="app">

       <div class="container">
       
       <header class="py-6 mb-8">
       <img alt="laracasts" src="http://lindacom.infinityfreeapp.com/images/thinkthumb.jpg">
     
       </header>

      
      <!-- <main class="flex"> -->
      <main class="row">

     <!--  <aside class="w-1/5"> -->
       <aside class="col-sm">
       <section class="mb-8">
       <h5 class="text-uppercase font-weight-bold mb-4">The Brand</h5>
       
       <ul class="list-reset"  style="text-decoration:none">
     <li class="text-sm pb-4"  style="text-decoration:none">  <router-link class="text-black" to="/">Logo</router-link></li>
      <li class="text-sm pb-4"  style="text-decoration:none"> <router-link class="text-black" to="/logo-symbol">Logo Symbol</router-link></li>
      <li class="text-sm pb-4"  style="text-decoration:none"> <router-link class="text-black" to="/colors">Colors</router-link></li>
      <li class="text-sm pb-4"  style="text-decoration:none"> <router-link class="text-black" to="/about">Typography</router-link></li>
      </ul>
      </section>

      <section class="mb-8">
       <h5 class="text-uppercase font-weight-bold mb-4">Doodles</h5>
       <ul class="list-reset">
     <li class="text-sm pb-4">  <router-link class="text-black" to="/">Mascot</router-link></li>
      <li class="text-sm pb-4"> <router-link class="text-black" to="/about">Illustrations</router-link></li>
      <li class="text-sm pb-4"> <router-link class="text-black" to="/about">Loaders and Animations</router-link></li>
      <li class="text-sm pb-4"> <router-link class="text-black" to="/about">Wallpapers</router-link></li>
       </ul>
      </section>

       </aside>

     <!--  <div class="primary flex-1"> -->
     <div class="col-sm"> 
       <router-view></router-view>
       </div>

       </main>

      
      
       </div>

       </div>

       <script src="/js/app.js"></script>
    </body>
</html>
