@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
<html>
   
   <head>
      <title>View Student Records</title>
   </head>
   
   <body>
   <div class="container box">
   <h3 align="center">Delete a user record</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search users</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search users" />
     </div>
     <div class="table-responsive">
   
      <table class="table table-striped table-bordered">
     
         <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Edit</td>
         </tr>
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td><a href ='delete/{{ $user->id }}'class="btn btn-warning" role="button">Delete</a></td>
         </tr>
         @endforeach

        

      </table>
       </div>
        </div>
         </div>
          </div>
   </body>
</html>
@endsection
