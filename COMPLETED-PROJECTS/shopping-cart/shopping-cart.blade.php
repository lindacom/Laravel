@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')
@if(Session::has('cart'))
<div class="row">

<div class="col-sm-6 col-md-6">
<ul class="list-group">
@foreach($products as $product)

<li class="list-group-item">

<span class="badge">{{ $product['qty'] }}</span>
<strong>{{ $product['item']['title'] }}</strong>

<!--format price to two decimal places -->
<span class="label label-success">{{ number_format($product['item']['price'], 2) }}</span>

<a href="{{ route('product.reduceByOne', ['id'=> $product['item']['id'] ]) }}">Reduce by 1</a> |
<a href="{{ route('product.increaseByOne', ['id'=> $product['item']['id'] ]) }}">Increase by 1</a> |
<a href="{{ route('product.remove', ['id'=> $product['item']['id'] ]) }}">Reduce All</a>

</li>
@endforeach
</ul>
</div>
</div>


<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<strong>Total: £ {{ number_format($totalPrice,2) }}</strong>
</div></div>

<hr />

<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<a href="{{ url('/shop/index') }}" class="btn btn-warning" role="button">Continue shopping</a>
<!-- <button type="button" class="btn btn-success">Checkout</button> -->
<a href="{{ route('checkout') }}" class="btn btn-success" role="button">Checkout</a>
</div></div>

@else 
<div class="row">
<div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
<h2>No items in cart</h2>
<a href="{{ url('/shop/index') }}" class="btn btn-warning" role="button">Continue shopping</a>
</div></div>
@endif

@endsection
