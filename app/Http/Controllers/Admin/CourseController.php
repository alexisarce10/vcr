<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\ApprovedCourse;
use App\Mail\RejectCourse;

class CourseController extends Controller
{
    public function index (){
        $courses = Course::where('status', 2)->paginate();
        return view('admin.courses.index', compact('courses'));
    }

    public function show (Course $course){
        $this->authorize('revision', $course);
        return view('admin.courses.show', compact('course'));
    }

    public function approved (Course $course){
        $this->authorize('revision', $course);
        if(!$course->lesson || !$course->goals || !$course->requirements || !$course ->image){
            return back()->with('info', 'No se puede publicar un curso que no esté completo');
        }

        $course->status = 3;
        $course->save();

        //Envío de correo electronico
        $mail = new ApprovedCourse($course);
        Mail::to($course->teacher->email)->queue($mail);


        return redirect()->route('admin.courses.index')->with('info', 'El curso ha sido publicado con éxito.');
    }

    public function observation(Course $course){
        return view('admin.courses.observation', compact('course'));
    }

    public function reject(Request $request, Course $course){
        $request->validate([
            'body' => 'required'
        ]);

        $course->observation()->create($request->all());

        $course->status = 1;
        $course->save();

        //Envío de correo electronico
        $mail = new RejectCourse($course);
        Mail::to($course->teacher->email)->queue($mail);

        return redirect()->route('admin.courses.index')->with('info', 'El curso ha sido rechazado con éxito.');
    }
    
}
