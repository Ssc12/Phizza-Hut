@extends('template')

@section('content')
    <div style="width:950px; margin:30px auto; text-align: left">
        <H1>Our freshly made pizza</H1>
    </div>

    <div style="width:900px; margin:30px auto; text-align: left; border-top: solid #e0e0e0">
        <h3>Order it now!</h3>
    </div>

    <div class="container-add-search">
        @if($user!=null)
            @if($user->role_id==2)
                <span>
                    <a class="btn btn-dark" href="{{url('pizza/add')}}">Add Pizza</a>
                </span>
            @else
                <div class="search-label">
                    <p>Search Pizza: </p>
                </div>
        
                <form class="form-inline my-2 my-lg-0 center-row" method="GET" action="{{ url('/pizza') }}">
                    <input class="form-control" type="text" name="q" placeholder="Search Here" style="width:500px; margin-right:10px;"> 
                    <button class="btn btn-primary" type="submit">Search</button>
                </form>
            @endif
        @endif
        
        @if($user==null)
            <div class="search-label">
                <p>Search Pizza: </p>
            </div>

            <form class="form-inline my-2 my-lg-0 center-row" method="GET" action="{{ url('/pizza') }}">
                <input class="form-control" type="text" name="q" placeholder="Search Here" style="width:500px; margin-right:10px;"> 
                <button class="btn btn-primary" type="submit">Search</button>
            </form>
        @endif
    </div>

    <div class="container-external">
        <div class="container-internal">
            @foreach ($pizzas as $pizza)
            <div class="container-item">
                <a href="{{url('pizza-info/'.$pizza->id)}}" class="no-decoration">
                    <img style="width:253px; height:150px;" src="{{ asset('/storage/'.$pizza->image) }}">
                </a> 
                <a href="{{url('pizza-info/'.$pizza->id)}}" class="no-decoration">
                    <p>{{$pizza->name}}</p>
                </a> 
                <p>Rp.{{$pizza->price}}</p>
                
                @if($user!=null)
                    @if($user->role_id==2)
                        <span>
                            <a class="btn btn-primary" href="{{url('pizza/update/'.$pizza->id)}}">Update Pizza</a>
                        </span>
                        <span>
                            <a class="btn btn-danger" href="{{url('pizza/delete/'.$pizza->id)}}">Delete Pizza</a>
                        </span>
                    @endif
                @endif
            </div> 
            @endforeach        
    </div>
    {{$pizzas->withQueryString()->links()}} 
@endsection