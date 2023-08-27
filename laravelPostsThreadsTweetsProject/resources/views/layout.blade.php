<!DOCTYPE html>
<html>
<!-- <html lang="{{ str_replace('_', '-', app()->getLocale()) }}"> -->
   
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        


        <title>Laravel</title>

        <!-- Fonts and stylesheet -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <!-- fontawesome icons -->
        <script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
          <!-- jquery -->
             <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
 


       
    </head>
    <body>
       @yield ('content')
     
    </body>
</html>
