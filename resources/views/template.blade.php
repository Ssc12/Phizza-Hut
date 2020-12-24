<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PHizza Hut</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/style2.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body class="body">
        <header class="header">
            <div class="nav">
                <div class="logo">
                    <a href="{{url('/')}}" class="no-decoration">
                        <img src="{{asset("storage/image/icon/phizza_hut.jpg")}}" alt="">
                    </a>
                    <h1 class="title">
                        <a href="{{url('/')}}" class="no-decoration">Phizza Hut</a>
                    </h1>
                </div>

                <div class="nav-bar">
                    @if ($user == NULL)
                        <ul class="first-drop">
                            <li class="not-last">
                                <a href="{{url('/login')}}" class="no-decoration">Login</a>
                            </li>
                            <li>
                                <a href="{{url('/register')}}" class="no-decoration">Register</a>
                            </li>
                        </ul>
                    @else
                        @if ($user->role_id == 1)
                            <ul class="first-drop">
                                <li class="not-last">
                                    <a href="{{url('/user/'.$user->id.'/history')}}" class="no-decoration">View Transaction History</a>
                                </li>
                                <li class="not-last">
                                    <a href="{{url('cart/user/'.$user->id)}}" class="no-decoration">View Cart</a>
                                </li>
                                <li class="username">
                                    <a href="" class="no-decoration">{{$user->username}}</a>
                                    <ul>
                                        <li>
                                            <a href="{{url('/logout')}}" class="no-decoration">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @else
                            <ul class="first-drop">
                                <li class="not-last">
                                    <a href="{{url('/all-user-history')}}" class="no-decoration">View All User Transaction</a>
                                </li>
                                <li class="not-last">
                                    <a href="{{url('/user/all')}}" class="no-decoration">View All User</a>
                                </li>
                                <li class="username">
                                    <a href="" class="no-decoration">admin</a>
                                    <ul>
                                        <li>
                                            <a href="{{url('/logout')}}" class="no-decoration">Logout</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        @endif
                    @endif
                </div>
            </div>
        </header>

        <div class="content">
            @yield('content')
        </div>

    </body>
</html>
