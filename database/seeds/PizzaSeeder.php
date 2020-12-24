<?php

use Illuminate\Database\Seeder;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizza = new App\Pizza;
        $pizza->name= "Cheese Bomb";
        $pizza->description = "pizza with cheese";
        $pizza->price = 85000;
        $pizza->image = "image/cheese_bomb.jpg";
        $pizza->save();

        $pizza = new App\Pizza;
        $pizza->name= "Tuna Man";
        $pizza->description = "pizza with tuna";
        $pizza->price = 90000;
        $pizza->image = "image/tuna_onion.jpg";
        $pizza->save();

        $pizza = new App\Pizza;
        $pizza->name= "Bacon and Egg";
        $pizza->description =  "pizza with bacon and egg";
        $pizza->price = 70000;
        $pizza->image = "image/bacon_egg.jpg";
        $pizza->save();

        $pizza = new App\Pizza;
        $pizza->name= "Buffalo Pizza";
        $pizza->description = "pizza with buffalo cut";
        $pizza->price = 85000;
        $pizza->image = "image/buffalo.jpg";
        $pizza->save();

        $pizza = new App\Pizza;
        $pizza->name= "Garlic Chicken";
        $pizza->description = "pizza with garlic chicken";
        $pizza->price = 80000;
        $pizza->image = "image/garlic_chicken.jpg";
        $pizza->save();

        $pizza = new App\Pizza;
        $pizza->name= "Italian Meatball";
        $pizza->description = "pizza with meatball";
        $pizza->price = 80000;
        $pizza->image = "image/italian_meatball.jpg";
        $pizza->save();

        $pizza = new App\Pizza;
        $pizza->name= "Spiced Lamb";
        $pizza->description = "pizza with spiced lamb";
        $pizza->price = 95000;
        $pizza->image = "image/spiced_lamb.jpeg";
        $pizza->save();

        $pizza = new App\Pizza;
        $pizza->name= "Whole Wheat Veggie";
        $pizza->description = "pizza with wheat vegetable";
        $pizza->price = 80000;
        $pizza->image = "image/whole_wheat_veggie.jpg";
        $pizza->save();
    }
}
