<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function Role(){
        return $this->belongsTo(Role::class);
    }

    public function Pizza(){
        return $this->belongsToMany(Pizza::class,'carts','user_id','pizza_id')->withPivot('qty')->withTimestamps();
    }

    public function Transaction(){
        return $this->hasMany(Transaction::class);
    }
}
