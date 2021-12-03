<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'gratis',
            'value' => 0
        ]);

        Price::create([
            'name' => '29.99 PEN (nivel 1)',
            'value' => 29.99
        ]);

        Price::create([
            'name' => '39.99 PEN (nivel 2)',
            'value' => 39.99
        ]);

        Price::create([
            'name' => '49.99 PEN (nivel 3)',
            'value' => 49.99
        ]);
    }
}
