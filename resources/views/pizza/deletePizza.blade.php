@extends('template')

@section('content')
    <div class="crud-del-box">
        <div class="crud-del-grid">
            <div class="crud-image">
                <img src="{{asset('/storage/'.$pizza->image)}}" alt="">
            </div>

            <div class="crud-description">
                <h2> <strong>{{$pizza->name}}</strong> </h2>
                <p class="crud-text">{{$pizza->description}}</p>
                <p class="crud-text">Rp.{{$pizza->price}}</p>

                
                <br>

                <form method="POST" action="{{ url('/pizza/delete/'.$pizza->id) }}" role="form">
                {{ csrf_field() }}
                    <div class="input second-column">
                        <button class="btn btn-danger" value="Delete Pizza" type="submit">Delete Pizza</button>
                    </div> 
                </form>           
            </div> 
        </div>
    </div>
@endsection