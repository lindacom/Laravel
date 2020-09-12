@extends('layouts.master')

@section('title')
    Laravel Shopping Cart
@endsection

@section('content')

<p style="margin-bottom:20px;"><span style="background:black;color:white;padding:10px;border-radius:25px;"><a href="{{ url('/shop/categories') }}">All categories</a></span><p>

@foreach($products->chunk(3) as $productChunk)
    <div class="row">
    @foreach($productChunk as $product)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
                <img src="{{ $product->imagePath }}" alt="..." class="img-responsive">
                <div class="caption">
                    <h3>{{ $product->title }}</h3>
                    <p class="description">{{ $product->description }}</p>

                      <div class="clearfix">
                      <div class="pull-left"><p><strong>Category:{{ $product->category }}</strong></p></div>
                      </div>

                    <div class="clearfix">
                        <div class="pull-left price"><p><strong>Price:${{ $product->price }}</strong></p></div>
                        <a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add to Cart</a>
 </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    @endforeach

@endsection
