<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Area;
use App\Models\Grade;
use App\Models\Price;
use App\Models\Level;

use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();

        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug' => Str::slug($title),
            'user_id' => $this->faker->randomElement([1, 2, 3, 4, 5]),//1,//User::all()->random()->id, //ESTO SE COMENTA PORQUE SE USARA EN ROLES Y PERMISOS CON MAS DE UN PROFESOR
            'area_id' => Area::all()->random()->id,
            'grade_id' => Grade::all()->random()->id,
            'price_id' => Price::all()->random()->id,
            'level_id' => Level::all()->random()->id,
        ];
    }
}
