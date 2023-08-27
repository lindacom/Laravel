@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
@if(Session::has('cart'))
<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<ul class="list-group">
@foreach($products as $product)
<li class="list-group-item">
<span class="badge">{{ $product['qty'] }}</span>
<strong>{{ $product['item']['title'] }}</strong>
<span class="label label-success">{{ $product['price'] }}</span>
<div class="btn-group">
<button type="button" class="btn btn-primary btn xs
dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
<ul class="dropdown-menu">
<!-- passes an id to the reduce by one function in the cart model -->
<li><a href="{{ route('product.reduceByOne', ['id'=> $product['item']['id'] ]) }}">Reduce by 1</a></li> 
<li><a href="{{ route('product.remove', ['id'=> $product['item']['id'] ]) }}">Reduce All</a></li>
</ul>
</div>
</li>
@endforeach
</ul>
</div>
</div>
<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<strong>Total: {{ $totalPrice }}</strong>
</div></div>
<hr />
<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<!-- <button type="button" class="btn btn-success">Checkout</button> -->
<a href="{{ route('checkout') }}" class="btn btn-success" role="button">Checkout</a>
</div></div>
@else 
<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<h2>No items in cart</h2>
</div></div>
@endif
@endsection