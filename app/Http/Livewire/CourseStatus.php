<?php

namespace App\Http\Livewire;

use App\Models\Course;
use App\Models\Lesson;
use Livewire\Component;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CourseStatus extends Component
{
    use AuthorizesRequests;

    public $course, $current;

    public function mount(Course $course){
        $this->course = $course;

        foreach ($course->lesson as $lesson) {
            if (!$lesson->completed) {
                $this->current = $lesson;
                break;
            }
        }

        if (!$this->current) {
            $this->current = $course->lesson->last();
        }

        $this->authorize('enrolled', $course);
    }

    public function render()
    {
        return view('livewire.course-status');
    }

    //Métodos

    public function changeLesson(Lesson $lesson){
        $this->current = $lesson;
       
    }

    //método creado para el toogle
    public function completed(){
        if ($this->current->completed) {
            //Eliminar registro
            $this->current->users()->detach(auth()->user()->id);

        }else {
            //Agregar registro
            $this->current->users()->attach(auth()->user()->id);
        }

        //Refrescan la vista
        $this->current = Lesson::find($this->current->id);
        $this->course = Course::find($this->course->id);
    }

    //Propiedades Computadas
    public function getIndexProperty(){
        return $this->course->lesson->pluck('id')->search($this->current->id);
    }

    public function getPreviousProperty(){
        if ($this->index == 0) {
            return null;
        }else {
            return $this->course->lesson[$this->index - 1];
        }
    }

    public function getNextProperty(){
        if ($this->index == $this->course->lesson->count() - 1) {
            return null;
        }else {
            return $this->course->lesson[$this->index + 1];
        }
    }

    public function getAdvanceProperty(){
        $i = 0;
        foreach ($this->course->lesson as $lesson) {
            if ($lesson->completed) {
                $i++;
            }
        }

        $advance = ($i * 100)/($this->course->lesson->count());

        return $advance;
    }

    public function download(){
        // DESCARGANDO RECURSOS MEDIANTE LIVE WIRE
        return response()->download(storage_path('app/' . $this->current->resource->url));
    }


}
