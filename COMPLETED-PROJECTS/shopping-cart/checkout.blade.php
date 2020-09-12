@extends('layouts.master')

@section('title')
    Laravel Checkout
@endsection

@section('content')

<h2>Checkout Form</h2> 
    <div class="row">  

         <div class="col-md-6">
         
         
  
      <form id="" name="" action= "{{ url('/ordered') }}" method="post" >
       @csrf
 <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" name="name" placeholder="John Doe" value="">   </div>                                                                       
         
          <div class="form-group">
           <label for="address"> Address</label> 
            <input type="text" id="address" class="form-control" name="address" value=""></div>

              <div class="form-group">        
            <label for="cardholdername"> cardholdername</label>
            <input type="text" id="cardholdername" class="form-control" name="cardholdername" value=""></div>
         
              <div class="form-group">
            
            <label for="credit card number">credit card number</label>
            <input type="text" id="credit card number" class="form-control" name="credit card number" placeholder="1111-2222-3333-4444"></div>
        
             <div class="form-group">
            <label for="expiry month">expiry month</label>
          <input type="text" id="expiry month" class="form-control" name="expiry month" placeholder="jan"></div>

 <div class="form-group">
          <label for="expiry year">expiry year</label>
          <input type="text" id="expiry year" class="form-control" name="expiry year" placeholder="2020"></div>
           
      
              
               <div class="form-group">
            <label for="cvc">CVC</label>
            <input type="text" id="cvc" class="form-control" name="cvc" placeholder="352"></div>
             
              
               
      
      <button type="button" id="billing" onclick="clearformFunction()" class="btn btn-primary">Clear form</button>

     
      <button class="btn btn-primary" type="submit" name="submit" id="submit" >Submit form</button>
     

       

      </form>
    </div>
    </div>
    @endsection
