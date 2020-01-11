  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ URL::to('/') }}">HOME</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
             <li><a href="{{ URL::to('signin') }}">Sign in</a></li>
             <li><a href="{{ URL::to('members') }}">Members</a></li>
             <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
             <li><a href="{{ URL::to('product') }}">Product</a></li>
                <li><a href="{{ URL::to('index') }}">Shop</a></li>
                 @if(Auth::check())
           {{ Auth::user()->name }} 
            @endif
               
                 <li><a href="{{ URL::to('/product/shoppingCart') }}"><i class="fa fa-shopping-cart" aria-hidden="true"></i> Shopping Cart 
               </a></li>
                  
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user" aria-hidden="true"></i> User Account <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    @if(Auth::check())
   <li><a href={{ URL::to('account') }}>My profile</a></li>
                  @endif
                     <li><a href={{ route('user.signin') }}>Sign in</a></li>
                       <li><a href={{ route('user.signup') }}>Sign up</a></li>
                  
                     
                        <li role="separator" class="divider"></li>
                       <li><a href={{ URL::to('checkout') }}>Checkout</a></li>
                         <li role="separator" class="divider"></li>
                          
                            <li role="separator" class="divider"></li>
                            
                          
                            <li role="separator" class="divider"></li>
                      
                        <li><a href={{ route('logout') }}>Logout</a></li>
                        <li role="separator" class="divider"></li>
                                     <li><a href={{ URL::to('view-records') }}>Admin area</a></li>
                           <li><a href={{ URL::to('users') }}>Admin area - users api</a></li>
                            <li><a href={{ URL::to('userlist') }}>Admin area - userlist</a></li>
                         
                    </ul>
                </li>
            </ul>
          
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>       
   
  
      
   
