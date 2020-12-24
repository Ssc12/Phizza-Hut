<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class CartController extends Controller
{
    public function viewCart($id){    
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $cart = $user->Pizza;
        return view('viewCart', [
            'user' => $user,
            'carts' => $cart
        ]);
    }

    public function addCart($pizzaId,Request $request){   
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $this->validate($request, [
            'qty'=>'required|numeric|min:1'
        ]);
        
        $checkCart = DB::table('carts')->where('user_id',$user->id)->where('pizza_id',$pizzaId)->first();

        if($checkCart == null){
            $cart = new \App\Cart();
            $cart->user_id = $user->id;
            $cart->pizza_id = $pizzaId;
            $cart->qty = $request->qty;
            $cart->save();    
        }else{
            foreach ($user->Pizza as $cart) {
                if($cart->pivot->pizza_id == $pizzaId){
                    $cart->pivot->qty = $request->qty + $checkCart->qty;
                    $cart->pivot->update();
                }
            }
        }
        
        return redirect()->route('viewCart',['id'=>$user->id]);
    }

    public function updateCart($pizzaId,Request $request){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $this->validate($request, [
            'qty'=>'required|numeric|min:1'
        ]);

            foreach ($user->Pizza as $cart) {
                if($cart->pivot->pizza_id == $pizzaId){
                    $cart->pivot->qty = $request->qty;
                    $cart->pivot->update();
                }
            }
       
        return redirect()->route('viewCart',['id'=>$user->id]);
    }

    public function deleteCart($pizzaId){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        foreach ($user->Pizza as $cart) {
            if($cart->pivot->pizza_id == $pizzaId){
                $cart->pivot->delete();
            }
        }

        return redirect()->route('viewCart',['id'=>$user->id]);
    }

     public function checkoutCart(){
 
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $carts = $user->Pizza;
        $transaction = new \App\Transaction;
        $transaction->user_id = $user->id;
        $transaction->save();

        foreach($carts as $cart){
            $detail = new \App\Detail;
            $detail->transaction_id = $transaction->id;
            $detail->pizza_id = $cart->pivot->pizza_id;
            $detail->qty = $cart->pivot->qty;
            $detail->save();
            $cart->pivot->delete();
        }

        return redirect()->route('viewCart',['id'=>$user->id]);
    }
}
