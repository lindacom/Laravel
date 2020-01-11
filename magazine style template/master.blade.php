<!doctype html>
<html>
<head>
<title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <link rel="stylesheet" href="{{ URL::to('src/css/main.css') }}">
</head>
<body>
<div class="container">

 <header class="row">
        @include('partials.header')
    </header>

    <header class="row">
        @include('partials.nav')
    </header>

    <div id="wrapper">
    <div id="main" class="row">
    

            @yield('content')

    </div>

    <footer class="row">
        @include('partials.footer')
    </footer>

</div>

<script src="{{ URL::to('src/js/app1.js') }}"></script>
 <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
