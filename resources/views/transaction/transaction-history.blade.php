@extends('template')

@section('content')
    <div class="red-white-box">
        @php
            $index = 0
        @endphp
        @foreach($transactionHistory as $transaction)
            @php
                if($index % 2 == 0){
                    $class = "red-bg";
                }else{
                    $class = "white-bg";
                }
                $index+=1;
            @endphp
            
            @if($loop->first == $loop->last)
                <div class="{{$class}} upper-radius lower-radius">
                    <h3 class="title">
                        <a href="{{url('/transaction/'.$transaction->id)}}" class="no-decoration">Transaction at {{$transaction->created_at}}</a>
                    </h3>
                </div>
            @elseif($loop->first)
                <div class="{{$class}} upper-radius">
                    <h3 class="title">
                        <a href="{{url('/transaction/'.$transaction->id)}}" class="no-decoration">Transaction at {{$transaction->created_at}}</a>
                    </h3>
                </div>
            @elseif($loop->last)
                <div class="{{$class}} lower-radius">
                    <h3 class="title">
                        <a href="{{url('/transaction/'.$transaction->id)}}" class="no-decoration">Transaction at {{$transaction->created_at}}</a>
                    </h3>
                </div>
            @else
                <div class="{{$class}}">
                    <h3 class="title">
                        <a href="{{url('/transaction/'.$transaction->id)}}" class="no-decoration">Transaction at {{$transaction->created_at}}</a>
                    </h3>
                </div>
            @endif
        @endforeach
        
        @if(sizeof($transactionHistory)==0)
                <strong>You dont have transaction history, please order some pizza.</strong>
        @endif
    </div>
@endsection