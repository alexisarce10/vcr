<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Course;
use App\Models\Area; //AGREGADO PARA FILTRAR
use App\Models\Level; //AGREGADO PARA FILTRAR
use App\Models\Grade; //AGREGADO PARA FILTRAR

use Livewire\WithPagination;

class CoursesIndex extends Component
{

    use WithPagination; //UTILIZADO PARA REALIZAR PAGINACION DINAMICA

    public $area_id;
    public $level_id;
    public $grade_id;


    public function render()
    {
        $areas = Area::all();

        $levels = Level::all();
        
        $grades = Grade::all();

        $courses = Course::where('status', 3)
                        ->area($this->area_id)
                        ->level($this->level_id)
                        ->grade($this->grade_id)
                        ->latest('id')
                        ->paginate(8);

        return view('livewire.courses-index', compact('courses', 'areas', 'levels', 'grades'));
    }

    //PARA RESTEAR FILTROS
    public function resetFilters(){
        $this->reset('area_id', 'level_id', 'grade_id');
    }
}
