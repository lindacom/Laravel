@extends('layouts.master')

@section('title')
    Laravel Shopping | categories
@endsection

@section('content')

<p><a href="{{ url('/shop/categories') }}">Categories</a><p>

    <div class="row">
    @foreach($categories as $category)
        <div class="col-sm-6 col-md-4">
            <div class="thumbnail">
            
                <div class="caption">
                    <h3>{{ $category->category }}</h3>
                  
      
                </div>
            </div>
        </div>
       
    </div>
    @endforeach
@endsection
