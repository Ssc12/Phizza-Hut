@extends('template')

@section('content')
    <div class="all-user"> 
        @foreach ($allUser as $currentUser)
            <div class="red-white-box" style="width:360px; margin: 30px 20px">
                <div class="red-header upper-radius">
                    <h3 class="title" style="margin:0;">User ID: {{$currentUser->id}}</h3>
                </div>
                <div class="white-content lower-radius paragraph" style="padding: 20px 30px; font-size:18px">
                    Username: {{$currentUser->username}} <br>
                    Email: {{$currentUser->email}} <br>
                    Address: {{$currentUser->address}} <br>
                    Phone number: {{$currentUser->phone_number}} <br>
                    Gender: {{$currentUser->gender}}
                </div>
            </div>
        @endforeach
    </div>
@endsection