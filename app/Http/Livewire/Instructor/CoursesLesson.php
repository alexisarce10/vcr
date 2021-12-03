<?php

namespace App\Http\Livewire\Instructor;

use App\Models\Lesson;
use App\Models\Platform;
use App\Models\Unity;
use Livewire\Component;

class CoursesLesson extends Component
{
    public $section, $lesson, $platforms, $name, $platform_id = 1, $url;

    protected $rules = [
        'lesson.name' =>   'required',
        'lesson.platform_id' =>  'required',
        //Validación youtube
        'lesson.url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
    ];

    public function mount(Unity $section){
        $this->section = $section;

        $this->platforms = Platform::all();

        $this->lesson = new Lesson();
    }

    public function render()
    {
        return view('livewire.instructor.courses-lesson');
    }

    public function edit(Lesson $lesson){

        $this->resetValidation(); //LIMPIA LOS ERRORES DE VALIDACION

        $this->lesson = $lesson;
    }

    public function store(){
        $rules = [
            'name' =>   'required',
            'platform_id' =>  'required',
            'url' => ['required', 'regex:%^ (?:https?://)? (?:www\.)? (?: youtu\.be/ | youtube\.com (?: /embed/ | /v/ | /watch\?v= ) ) ([\w-]{10,12}) $%x'],
        ];

        if ($this->platform_id == 2) {
            $rules['url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }

        $this->validate($rules);

        Lesson::create([
            'name' => $this->name,
            'platform_id' => $this->platform_id,
            'url' => $this->url,
            'unity_id' => $this->section->id
        ]);

        // para formatear la creacion
        $this->reset(['name', 'platform_id', 'url']);        
        $this->section = Unity::find($this->section->id);

    }

    public function update(){

        if($this->lesson->platform_id == 2 ){
            //Validación Vimeo
            $this->rules['lesson.url'] = ['required', 'regex:/\/\/(www\.)?vimeo.com\/(\d+)($|\/)/'];
        }
        $this->validate();

        $this->lesson->save();
        $this->lesson = new Lesson();

        $this->section = Unity::find($this->section->id);
    }

    public function destroy(Lesson $lesson){
        $lesson->delete();
        $this->section = Unity::find($this->section->id);
    }

    public function cancel(){
        $this->lesson = new Lesson();
    }
    
}
