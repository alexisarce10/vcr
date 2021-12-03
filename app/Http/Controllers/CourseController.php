<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

class CourseController extends Controller
{
    public function index(){
        return view('courses.index');
    }

    public function show(Course $course){
        $this->authorize('published', $course);
       
        $similares  = Course::where('area_id', $course->area_id)
                                ->where('id', '!=', $course->id)
                                ->where('status', 3)
                                ->latest('id')
                                ->take(5)
                                ->get();

        return view('courses.show', compact('course', 'similares'));
    }

    public function enrolled(Course $course){
        
        // RECUPERANDO RELACION MUCHOS A MUCHOS -> GREGANDO REGISTRO DE QUIEN LLEVA EL CURSO
        $course->student()->attach(auth()->user()->id);

        //REDIRIGIENTO A LA RUTA
        return redirect()->route('courses.status', $course);
    }

}
