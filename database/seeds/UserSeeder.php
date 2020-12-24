<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;
        $user->email = "dj@gmail.com";
        $user->username = "darwis";
        $user->password = "123";
        $user->role_id = 1;
        $user->address="";
        $user->phone_number="";
        $user->gender = "male";
        $user->save();
        
        $user = new App\User;
        $user->email = "stev@gmail.com";
        $user->username = "steven";
        $user->password = "123";
        $user->role_id = 2;
        $user->address="";
        $user->phone_number="";
        $user->gender = "male";
        $user->save();
    }
}
