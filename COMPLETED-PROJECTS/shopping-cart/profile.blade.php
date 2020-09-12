@extends('layouts.master')


@section('content')
<div class="row">
<div class="col-md-8 col-md-offset-2">

<h1>User Profile </h1>


  <section class="row new-post">
        <div class="col-md-6 col-md-offset-3">
            <header><h3>Your Account</h3></header>
            <form action="{{ route('account.save') }}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="first_name">First Name</label>
                {{--    <input type="text" name="name" class="form-control" value="{{ $user->name }}" id="name">--}}
                </div>
                <div class="form-group">
                    <label for="image">Image (only .jpg)</label>
                    <input type="file" name="image" class="form-control" id="image">
                </div>
                <button type="submit" class="btn btn-primary">Save Account</button>
                <input type="hidden" value="{{ Session::token() }}" name="_token">
            </form>
        </div>
    </section>
 {{--   @if (Storage::disk('local')->has($user->first_name . '-' . $user->id . '.jpg'))
        <section class="row new-post">
            <div class="col-md-6 col-md-offset-3">
                <img src="{{ route('account.image', ['filename' => $user->first_name . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
            </div>
        </section>
    @endif --}}




<hr>

{{-- N.b. When you use a blade echo {{ $data }} it will automatically escape the output. It can only escape strings 
 $data->ac is an array and $data is an object, therefore you need to be specific of how the data should be outputted--}}

<h2>My Orders</h2>
 @foreach($purchases as $purchase)
<h3>Order date: {{ date('d-m-Y', strtotime($purchase->created_at)) }} </h3> {{-- changed date to d-m-y --}}
<div class="panel panel-default">
<div class="panel-body">
 <ul class="list-group"> 
 
 {{-- item is set in the cart model. Item is an associative array.  Using brackets because we are accesing a field in the array --}}

@foreach($purchase->cart->items as $item) 

<li class="list-group-item">
<span class="badge">${{ $item['price'] }}</span>
{{$item['item']['title'] }} | {{ $item['qty'] }} Unit
</li>
@endforeach
</ul> 
</div>
<div class="panel-footer">
<strong>Total Price: ${{ $purchase->cart->totalPrice }}</strong>
</div>
</div> 
@endforeach
</div>
</div>

@endsection
