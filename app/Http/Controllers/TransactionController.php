<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
use Session;

class TransactionController extends Controller
{
    public function showHistory($id){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');
        
        $history = \App\Transaction::where('user_id','=',$id)->get();
        return view('transaction.transaction-history',[
            'user' => $user,
            'transactionHistory' => $history
        ]);
    }

    public function allUserHistory(){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $history = \App\Transaction::all()->sortBy("user_id");
        return view('transaction.all-user-transaction',[
            'user' => $user,
            'transactionHistory' => $history
        ]);
    }

    public function transactionDetail($id){
        if(Session::get('login') == TRUE){
            $user = \App\User::find(Session::get('id'));
        }else return redirect()->route('home');

        $transaction = \App\Transaction::where('id', $id)->first();
        return view('transaction.transaction-detail',[
            'user' => $user,
            'transaction' => $transaction
        ]);
    }
}
