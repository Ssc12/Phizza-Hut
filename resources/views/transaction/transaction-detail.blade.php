@extends('template')

@section('content')
    @foreach ($transaction->Pizza as $detail)
        <div class="white-box upper-radius lower-radius thirty-seventy-column">
            <div class="image">
                <img src="{{asset('/storage/'.$detail->image)}}" alt="">
            </div>
            <div class="paragraph">
                <h3 class="title">{{$detail->name}}</h3>
                Rp. {{$detail->price}} <br>
                Quantity: {{$detail->pivot->qty}} <br>
                Total price: Rp.{{$detail->price * $detail->pivot->qty}}
            </div>
        </div>  
    @endforeach
@endsection