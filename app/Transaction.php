<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function Pizza(){
        return $this->belongsToMany(Pizza::class, 'details','transaction_id', 'pizza_id')->withPivot('qty')->withTimestamps();
    }
}
