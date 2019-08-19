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
   <h3 align="center">User records</h3><br />
   <div class="panel panel-default">
    <div class="panel-heading">Search users</div>
    <div class="panel-body">
     <div class="form-group">
      <input type="text" name="search" id="search" class="form-control" placeholder="Search users" /> </div>

       
    

      
     <div class="table-responsive">
     
      <table class="table table-striped table-bordered">
         <tr>
            <td>ID</td>
            <td>Name</td>
         </tr>
         @foreach ($users as $user)
         <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
         </tr>
         @endforeach
      </table>
      
   </div>
      </div>
    </div>    
   </div>

<div class="container">
 <a href="{{ URL::to('insert') }}" class="btn btn-danger pull-right" role="button">Add a user</a> <br />
<a href="{{ URL::to('edit-records') }}" class="btn btn-success pull-right" role="button">Edit a user</a> <br />
<a href="{{ URL::to('delete-records') }}" class="btn btn-danger pull-right" role="button">Delete a user</a> <br />
                                   </div>
   </body>
</html>
@endsection
