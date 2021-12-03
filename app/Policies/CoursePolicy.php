<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Course;
use App\Models\Review;
use Illuminate\Auth\Access\HandlesAuthorization;


class CoursePolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    // METODO USADO PARA VISUALIZAR ESTADOS --> SE DENOMINA POLICY DE LARAVEL
    public function enrolled(User $user, Course $course){
        return $course->student->contains($user->id);
    }

    public function published(?User $user, Course $course){
        if ($course->status == 3) {
            return true;
        } else {
            return false;
        }
    }

    public function dicatated(User $user , Course $course){
        if ($course->user_id == $user->id) {
            return true;
        }else{
            return false;
        }
    }

    public function revision(User $user, Course $course){
        if ($course->status == 2) {
            return true;
        } else {
        return false;
        }
    }

    //Metodo para las reseñas
    public function valued(User $user, Course $course){
        if (Review::where('user_id', $user->id)->where('course_id', $course->id)->count()) {
            return false;
        }else {
            return true;
        }
    }


}
