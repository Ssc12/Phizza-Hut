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
                    <a href="{{url('/transaction/'.$transaction->id)}}" class="all-history">
                        Transaction at {{$transaction->created_at}} <br>
                        User ID :  {{$transaction->user_id}} <br>
                        Username : {{$transaction->User->username}}
                    </a>
                </div>
            @elseif($loop->first)
                <div class="{{$class}} upper-radius">
                    <a href="{{url('/transaction/'.$transaction->id)}}" class="all-history">
                        Transaction at {{$transaction->created_at}} <br>
                        User ID :  {{$transaction->user_id}} <br>
                        Username : {{$transaction->User->username}}
                    </a>
                </div>
            @elseif($loop->last)
                <div class="{{$class}} lower-radius">
                    <a href="{{url('/transaction/'.$transaction->id)}}" class="all-history">
                        Transaction at {{$transaction->created_at}} <br>
                        User ID :  {{$transaction->user_id}} <br>
                        Username : {{$transaction->User->username}}
                    </a>
                </div>
            @else
                <div class="{{$class}}">
                    <a href="{{url('/transaction/'.$transaction->id)}}" class="all-history">
                        Transaction at {{$transaction->created_at}} <br>
                        User ID :  {{$transaction->user_id}} <br>
                        Username : {{$transaction->User->username}}
                    </a>
                </div>
            @endif
        @endforeach
    </div>
@endsection