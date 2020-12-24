<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    public function User(){
        return $this->belongsToMany(User::class,'carts','pizza_id','user_id')->withPivot('qty')->withTimestamps();
    }

    public function Transaction(){
        return $this->belongsToMany(Transaction::class, 'details','pizza_id', 'transaction_id')->withPivot('qty')->withTimestamps();
    }
}