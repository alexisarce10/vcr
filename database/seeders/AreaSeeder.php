<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Area;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Area::create([
            'name'=>'Comunicación'
        ]);

        Area::create([
            'name'=>'Matemática'
        ]);

        Area::create([
            'name'=>'Ciencia y Tecnología'
        ]);
    }
}
