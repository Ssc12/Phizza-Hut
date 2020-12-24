<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Session;

class UserController extends Controller
{

    public function showLoginForm(){
        if(Cookie::get('username')!=null){
            $cookie = true;
            $username = Cookie::get('username');
            $password = Cookie::get('password');
        }else{
            $cookie = false;
            $username = null;
            $password = null;
        }
        
        $user = NULL;
        return view('login',[
            'user' => $user,
            'cookie' =>$cookie,
            'username' =>$username,
            'password' => $password
        ]);
    }

    public function login(Request $request){

        $this->validate($request, [
            'username' => 'required|min:4',
            'password' => 'required|min:6',
        ]);

        $user = \App\User::where('username',$request->username)->first();

        if($user){
            if($user->password == $request->password){
                Session::put('id', $user->id);
                Session::put('login',TRUE);
                if($request->has('remember_me')){
                    Cookie::queue('username', $request->username, 120);
                    Cookie::queue('password', $request->password, 120);
                }else{
                    if(Cookie::get('username') != $request->username){
                        Cookie::queue(Cookie::forget('username'));
                        Cookie::queue( Cookie::forget('password'));
                    }
                }
                return redirect(route('home'));
            }
        }else{
            return back()->with('errorMsg','Inputed data is either invalid or not exist !!');
        }
    }

    public function showRegisterForm(){
        if(!Session::get('login')){
            $user = \App\User::find(Session::get('id'));
        }else $user = NULL;
        return view('register',[
            'user' => $user
        ]);
    }

    public function register(Request $request){
        $this->validate($request, [
            'username' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_pass' => 'required|same:password',
            'address' => 'required',
            'phone_number' => 'required|numeric',
            'gender' => 'required'
        ]);

        $user =  new \App\User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role_id = 1;
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->gender = $request->gender;
        $user->save();

        return redirect(route('home'));
    }

    public function logout(){
        Session::flush();
        return redirect()->route('home');
    }

    public function viewAllUser(){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else $user = NULL;
        $allUser = \App\User::all();
        return view('viewAllUser',[
            'user' => $user,
            'allUser' => $allUser
        ]);
    }
}
