<?php

use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cart = new App\Cart;
        $cart->user_id=1;
        $cart->pizza_id=1;
        $cart->qty=1;
        $cart->save();

        $cart = new App\Cart;
        $cart->user_id=1;
        $cart->pizza_id=3;
        $cart->qty=2;
        $cart->save();
    }
}
