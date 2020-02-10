@extends('layouts.master')

@section('title')
    Welcome!
@endsection

@section('content')

<div class="home-content" >
    
 <!--FEATURE ARTICLE -->   

    <div class="feature-post">

           <div class="feature-post-inner">

    <article class="feature-post-item">
      <figure class="feature-post-image">
      <a> <img src="http://lindacom.infinityfreeapp.com/images/beach.jpg" width="293" height="172" class="feature-post-image-image" /></a></figure>

                      <div class="feature-post-content">

                 <header class="feature-post-header">

                  <h3 class="feature-post-title">This is a heading </h3>
                  <a></a>

                               <div class="posts-meta">
                  
                   <span class="posts-meta-date"><i class="fa fa-clock-o"></i>January 4, 2020</span>
                   
                   <span class="posts-meta-comment">
                   <i class="fa fa-comment-o"></i>
                    </span>

                                </div>
                
                </header>

                   <div class="feature-post-content-text home-clearfix">
                       <div class="feature-content-inner">
                       <p>This is some text</p>
                       </div>
                    </div>
            </div>
  </article>          

</div>
                                           </div>



<!-- SECTION HEADING AND TEXT -->      
  
<div class="large-post">

   <h4 class="large-post-title">
   <span class="large-post-title-inner">This is a heading</span></h4>  
       
       <div class="large-post-text">
       <p><strong>This is some bold text</strong></p>
      </div>

</div>



<!-- TWO COLUMN ARTICLES -->   
<div class="clearfix">

   <div class="container col-md-12" > 

<!-- top two column row -->

          <div class="row post-columns-left display-flex">

                <div class="col-md-6">

                         <ul class="small-articles clearfix">

                                 <li class="small-articles-inner clearfix">

                                      <figure class="small-articles-thumb">
                                      <a href="http://lindacom.infinityfreeapp.com/laravel/public/members" title="">
                                      <img src="http://lindacom.infinityfreeapp.com/images/login.jpg" width="80" height="60" class="small-articles-image" />
                                      </a> </figure> 

               
   <h4 class="clearfix">Members login page</h4> 
  <p>This is some more text</p> 

                    <div class="posts-meta"> 
   <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
                   </div>

       
         
         </li>
</ul>
   </div>



   <div class="col-md-6">

                         <ul class="small-articles clearfix">

                                 <li class="small-articles-inner clearfix">

                                      <figure class="small-articles-thumb">
                                      <a href="http://lindacom.infinityfreeapp.com/laravel/public/index" title="">
                                      <img src="http://lindacom.infinityfreeapp.com/images/shopping-cart.jpg" width="80" height="60" class="small-articles-image" />
                                      </a> </figure>

       <div>         
   <h4 class="clearfix">This is another heading</h4> 
   <p>This is yet more text</p> </div>

                    <div class="posts-meta"> 
   <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
                   </div>

       
         
         </li>
</ul>
   </div> <!-- end of column--> 


</div> <!-- end of row--> 

   <!-- horizontal dividing line - not used
<div class="vl"></div> --> 

<!-- right --> 

<div class="row post-columns-right display-flex"> 


<div class="col-md-6">

                         <ul class="small-articles clearfix">

                                 <li class="small-articles-inner clearfix">

                                      <figure class="small-articles-thumb">
                                      <a href="http://lindacom.infinityfreeapp.com/laravel/public/" title="">
                                      <img src="http://lindacom.infinityfreeapp.com/images/bookshelf image.jpg" width="80" height="60" class="small-articles-image" />
                                      </a> </figure>

       <div>         
   <h4 class="clearfix">heading</h4> 
   <p>some text</p> </div>

                    <div class="posts-meta"> 
   <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
                   </div>

       
         
         </li>
</ul>
   </div>

    <div class="col-md-6">

                         <ul class="small-articles clearfix">

                                 <li class="small-articles-inner clearfix">

                                      <figure class="small-articles-thumb">
                                      <a href="http://lindacom.infinityfreeapp.com/laravel/public/userlist" title="">
                                      <img src="http://lindacom.infinityfreeapp.com/images/games.jpg" width="80" height="60" class="small-articles-image" />
                                      </a> </figure>

       <div>         
   <h4 class="clearfix">heading</h4> 
   <p>some text</p> </div>

                    <div class="posts-meta"> 
   <span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star checked"></span>
<span class="fa fa-star"></span>
<span class="fa fa-star"></span>
                   </div>

      
         
         </li>
</ul>
   </div> 
      
      </div>  <!--end of column --> 


   </div> <!--end of row --> 

      </div> <!--end of  container --> 
 
</div><!--end of two column articles --> 
 
   
     
        

<!--SIDEBAR --> 

<div class="home-sidebar">

             <div class="sidebar-title-one">

              <h4 class="sidebar-title-heading"><span class="sidebar-title-inner">heading</span> </h4>

            <!-- <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>  --> 
            

           <div class="sidebar-title-one-inner"></div>

           </div>


<div class="sidebar-article">
 
<ul class="sidebar-articles clearfix">
        <li class="sidebar-articles-item clearfix">
        <p class="sidebar-articles-small-titles"></p>
        <span class="posts-meta-comment"><i class="fa fa-thumbs-up"></i></span>
                      <a href="http://lindacom.infinityfreeapp.com/laravel/public/users" title="">Link text</a>
           
         <!--  <figure class="sidebar-articles-thumbnails"><a href="http://lindacom.infinityfreeapp.com/laravel/public/" title="">
<img src="http://lindacom.infinityfreeapp.com/images/beach.jpg" width="80" height-"60" class="sidebar-articles-images"/>My heading</a></figure>  

               <div class="sidebar-articles-headings">

                     
                       

                            <div class="sidebar-articles-meta">
                            <span class="posts-meta-date"><i class="fa fa-clock-o"></i></span>

                           <span class="posts-meta-comment">
                          <i class="fa-fa-comment-o"></i>
                           <a></a></span> 
                                                      </div>
                          
                     </div> --> 

        </li>
        
</ul>

</div>  <!--end of article one -->
                     
                     <div class="sidebar-title-heading"></div>
                     <div class="sidebar-article"></div> <!--end of article two -->

 <!--end of sidebar -->








</div> <!--end of main home content section --> 




@endsection

