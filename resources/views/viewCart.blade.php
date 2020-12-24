@extends('template')

@section('content')
@foreach ($carts as $cart) 
    <div class="cart-box">
        <div class="crud-grid">
 
                <div class="cart-image">
                    <img src="{{asset('/storage/'.$cart->image)}}" alt="">
                </div>
            
                <div class="cart-description">
                    <h2> <strong>{{$cart->name}}</strong> </h2>
                    <p class="cart-text">Rp.{{$cart->price}}</p>
                    <p class="cart-text">Quantity: {{$cart->pivot->qty}}</p>

                    <form method="POST" action="{{ url('/cart/update/pizza/'.$cart->id) }}" role="form">
                        {{ csrf_field() }}
                        <div class="cart-qty-container">  
                            <p style="margin-top: 3px; margin-right: 20px;">Quantity :</p> 
                            <div class="input">    
                                <input type="number" name="qty" id="" class="text-box">
                            </div>
                        </div>

                        <div class="input second-column">
                            <button class="btn btn-primary" value="Update Cart Quantity" type="submit">Update Quantity</button>
                        </div>
                    </form> 

                    <form method="POST" action="{{ url('/cart/delete/pizza/'.$cart->id) }}" role="form">
                        {{ csrf_field() }}
                        <button class="btn btn-danger" value="Delete from Cart" type="submit" style="margin-top: 15px; width: 181px;">Delete From Cart</button>
                    </form>
                </div>            
        </div>  
    </div>
@endforeach

@if($errors->any())
{{$errors->first()}}
@endif

    @if(sizeof($carts)>0)
        <form method="POST" action="{{ url('/cart/checkout/') }}" role="form">
            {{ csrf_field() }}
            <div class="input second-column">
                <button class="btn btn-dark" value="Checkout Cart" type="submit">Checkout</button>
            </div>   
        </form>
    @else
        <img src="{{asset("storage/image/icon/empty_cart.png")}}" alt="">
    @endif
    
@endsection