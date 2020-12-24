@extends('template')

@section('content')
    <div class="red-white-box">
        <div class="red-header upper-radius">
            <h3 class="title">Login</h3>
        </div>
        <div class="white-content lower-radius">
            <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
                <div class="grid-layout thirty-seventy-column">
                        <div class="label">Username</div>
                        <div class="input">
                            @if ($cookie == false)
                                <input type="text" name="username" id="" class="text-box">
                            @else
                                <input type="text" name="username" id="" class="text-box" value={{$username}}>
                            @endif
                        </div>
                        
                        <div class="label">Password</div>
                        <div class="input">
                            @if ($cookie == false)
                                <input type="password" name="password" id="" class="text-box">
                            @else
                                <input type="password" name="password" id="" class="text-box" value={{$password}}>
                            @endif
                        </div>

                        <div class="input second-column">
                            <input type="checkbox" name="remember_me" id="remember_me" value="remember_me">
                            <label for="remember_me" class="radio-label">Remember Me</label>
                        </div>

                        <div class="input second-column">
                            <button type="submit" value="Login" class="button red-button">Login</Button>
                            <a href="" class="blue-link">Forgot Your Password?</a>
                        </div>
                </div>
            </form>

            @if($errors->any())
                 {{$errors->first()}}
            @endif

            @if($errMsg = Session::get('errorMsg'))
                <strong>{{$errMsg}}</strong>
            @endif
        </div>
    </div>

@endsection