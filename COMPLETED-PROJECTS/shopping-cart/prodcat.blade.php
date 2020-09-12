@extends('layouts.master')

@section('title')
    Laravel Shopping | categories
@endsection

@section('content')

<p><a href="{{ url('/shop/categories') }}">All categories</a><p>

{{ $category->category }}


   {{ $category->category->product}}


  {{-- @foreach($category as $c) 
     <div class="mb-2" class="font-size-12 text-gray-5">{{ $c }}</a></div>
      <h5 class="mb-1 product-item__title" class="text-blue font-weight-bold">{{ $c ['prod_name'] }}</a></h5>
            <li class="line-clamp-1 mb-1 list-bullet">{{ $c ['prod_description'] }}</li>
            <div class="text-gray-20 mb-2 font-size-12">{{ $c ['prod_item_code'] }}</div>
            <div class="flex-center-between mb-1">
                <div class="prodcut-price">
                   <div class="text-gray-100">LKR {{ $c ['prod_price'] }}.00</div>
                </div>
            </div> 
        </div>
@endforeach--}}


@endsection
