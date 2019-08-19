@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
<html>
   <head>
      <title>Records Management | Add</title>
   </head>

   <body>
   <h2>Add a user</h2>
      <form action ={{ URL::to('create') }} method = "post">
         <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>">
         <table>

 <div class="form-group">
                    <label for="name">Name</label>
                    <input type='text' name='stud_name' />
                </div>
                <button type="submit" value = "Add student"class="btn btn-success">Add user</button>


</div>


          
         </table>
      </form>
      
   </body>
</html>
@endsection
