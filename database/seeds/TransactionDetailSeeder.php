<?php

use Illuminate\Database\Seeder;

class TransactionDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $transactionDetail = new App\Detail;
        $transactionDetail->transaction_id=1;
        $transactionDetail->pizza_id=1;
        $transactionDetail->qty=3;
        $transactionDetail->save();
    }
}
