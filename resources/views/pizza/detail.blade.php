@extends('template')

@section('content')
    <div class="white-box">
        <div class="detail-grid">
            <div class="detail-image">
                <img src="{{asset('/storage/'.$pizza->image)}}" alt="">
            </div>
            <div class="detail-description">
                <h1 class="title">{{$pizza->name}}</h1>
                <p class="paragraph">{{$pizza->description}}</p>
                <h3 class="price">Rp {{$pizza->price}}</h3>

                @if ($user != NULL)
                    @if($user->role_id == 1)  
                    <form method="POST" action="{{ url('/cart/add/pizza/'.$pizza->id) }}" role="form">
                        {{ csrf_field() }}
                        <div style="display:grid; grid-template-columns:100px 280px; margin: 20px 0">               
                            <div class="label">Quantity</div>
                            <div class="input">
                                <input type="number" name="qty" id="" class="text-box">
                            </div>
                        </div>

                        <Button type="submit" value="Add to Cart" class="btn btn-danger">Add to Cart</button>
                    </form>
                        @if($errors->any())
                        {{$errors->first()}}
                        @endif
                    @endif
                @endif
            </div>
        </div>
    </div>
@endsection