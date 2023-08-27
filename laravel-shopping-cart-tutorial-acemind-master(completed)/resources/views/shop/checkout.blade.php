@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<h2>Responsive Checkout Form</h2>
reduce the form to only have these fields Name, address, cardholdername, credit card number, expiry month, expiry year, cvc
<!-- 2 COLUMN LAYOUT-->

 
    <div class="row">

    <!-- left-->

         <div class="columns large-6">
         
         
  
      <form id="billing" name="billing-form" action= "/books/checkout.php" method="post" >

      
       
            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label><span class="error">* </span> <!-- shows errors on the page -->
            <input type="text" id="fname" name="firstname" placeholder="John Doe" value="" readonly>   <!-- keeps the input value in the text box -->                                                                             
            
            
           
            <label for="email"><i class="fa fa-envelope"></i> Email</label> <span class="error">* </span>
            <input type="text" id="email" name="email" placeholder="john@example.com" value="test@test.com" readonly>

            <!--value=""-->
           
            
            <label for="adr"><i class="fa fa-address-card"></i> Address</label> <span class="error">* </span>
            <input type="text" id="adr" name="address" value="" readonly>
          <!--""-->
            
            <label for="city"><i class="fa fa-university"></i> City</label>
            <input type="text" id="city" name="city" value="" readonly>
           <!-- ""-->

            <label for="town">Town</label>
            <input type="text" id="town" name="town" value="" readonly >
           <!-- ""-->
             
            <label for="postcode">Postcode</label> <span class="error">* </span>
            <input type="text" id="postcode" name="postcode" value="" readonly>
           <!-- ""-->
           
              
          </div>

 <!-- middle column-->
<div class="columns large-6">
                     
                     <h3>Payment</h3>
            <hr />
            <label for="fname">Accepted Cards</label>

             <!-- card icons-->
          
          <a href="#" id="visa">   <i class="fab fa-cc-visa fa-w-18 fa-3x" style="size:50px"; "color:navy;" ></i></a>
            <a href="#" id="amex">    <i class="fab fa-cc-amex fa-w-18 fa-3x" style="color:blue;"></i></a>
            <a href="#" id="mastercard">   <i class="fab fa-cc-mastercard fa-w-18 fa-3x" style="color:red;"></i></a>
            <a href="#" id="discover">   <i class="fab fa-cc-discover fa-w-18 fa-3x" style="color:orange;"></i></a>

              <hr />
            
            <label for="cname">Name on Card</label><span class="error">* </span>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
             
            
            <label for="ccnum">Card number</label><span class="error">*  </span>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            
             <label for="ccnum"></label><span class="error">*  </span>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            
            <label for="expmonth">Exp Month</label><span class="error">* </span>
           <!-- <input type="text" id="expmonth" name="expmonth" placeholder="September"> -->
           

<select name="expmonth" id="expmonth">
<option value="">Select a month</option>
  <option value="january">January</option>
  <option value="february">February</option>
  <option value="march">March</option>
  <option value="april">April</option>
  <option value="may">May</option>
  <option value="june">June</option>
  <option value="july">July</option>
  <option value="august">August</option>
  <option value="september">September</option>
  <option value="october">October</option>
  <option value="november">November</option>
  <option value="december">December</option>
</select>
            
            
            <label for="expyear">Exp Year</label><span class="error">* </span> 
        <!--    <input type="text" id="expyear" name="expyear" placeholder="2020"> -->

        <select name="expyear" id="expyear">
<option value="">Select a year</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
  <option value="2022">2022</option>
  <option value="2023">2023</option>
  <option value="2024">2024</option>
  <option value="2025">2025</option>
  <option value="2026">2026</option>
  <option value="2027">2027</option>
  <option value="2028">2028</option>
  <option value="2029">2029</option>
  <option value="2030">2030</option>
  <option value="2031">2031</option>
</select>
           
              
              
            <label for="cvv">CVV</label><span class="error">*  </span> 
            <input type="text" id="cvv" name="cvv" placeholder="352">
             
              
               
        <label>
          <input type="checkbox" checked="checked" name="sameadr" onclick="toggleAddress()"> Shipping address is the same as billing address
        </label>

        <div style="display:none" id="shipadd">
        <label for="shipadr"><i class="fa fa-address-card"></i> Address</label> 
            <input type="text" id="shipadr" name="shipaddress" value="">
          
            
            <label for="shipcity"><i class="fa fa-university"></i> City</label>
            <input type="text" id="shipcity" name="shipcity" value="">

            <label for="shiptown">Town</label>
            <input type="text" id="shiptown" name="shiptown" value="" >
             
            <label for="shippostcode">Postcode</label> <span class="error">* </span>
            <input type="text" id="shippostcode" name="shippostcode" value="">
            </div>
      
      <!-- button to clear the form -->
      
      <button type="button" id="billing" onclick="clearformFunction()" class="success button">Clear form</button>

     
      <button class="button" type="submit" name="submitform" id="btn2" >Submit form</button>
     

       

      </form>
    </div>
    </div>
    @endsection