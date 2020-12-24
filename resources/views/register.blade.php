@extends('template')

@section('content')
    <div class="red-white-box">
        <div class="red-header upper-radius">
            <h3 class="title">Register</h3>
        </div>
        <div class="white-content lower-radius">

            <form role="form" method="POST" action="{{url('/register')}}">
            {{ csrf_field() }}
                <div class="grid-layout thirty-seventy-column">
                    <div class="label">Username</div>
                    <div class="input">
                        <input type="text" name="username" id="" class="text-box">
                    </div>
                    
                    <div class="label">E-Mail Address</div>
                    <div class="input">
                        <input type="text" name="email" id="" class="text-box">
                    </div>
                    
                    <div class="label">Password</div>
                    <div class="input">
                        <input type="password" name="password" id="" class="text-box">
                    </div>

                    <div class="label">Confirm Password</div>
                    <div class="input">
                        <input type="password" name="confirm_pass" id="" class="text-box">
                    </div>

                    <div class="label">Address</div>
                    <div class="input">
                        <input type="text" name="address" id="" class="text-box">
                    </div>

                    <div class="label">Phone Number</div>
                    <div class="input">
                        <input type="text" name="phone_number" id="" class="text-box">
                    </div>

                    <div class="label">Gender</div>
                    <div class="input gender">                    
                        <div class="one-line">
                            <input type="radio" name="gender" id="male" value="male" >
                            <label for="male" class="radio-label">Male</label>
                        </div>
                        <div class="one-line">
                            <input type="radio" name="gender" id="female" value="female">
                            <label for="female" class="radio-label">Female</label>
                        </div>
                    </div>

                    <div class="input second-column">
                        <button type="submit" value="Register" class="button red-button">Register</Button>
                    </div>
                </div>
            </form>

            @if($errors->any())
            {{$errors->first()}}
            @endif
        </div>
    </div>

@endsection