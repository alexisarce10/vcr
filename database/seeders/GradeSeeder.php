<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Grade;

class GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Grade::create([
            'name' => 'Primero'
        ]);

        Grade::create([
            'name' => 'Segundo'
        ]);

        Grade::create([
            'name' => 'Tercero'
        ]);
    }
}
