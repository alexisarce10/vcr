<x-instructor-layout :course="$course">

    {{-- COMPONENTE DE LIVEWIRE - GOALS --}}
    <div>
        @livewire('instructor.courses-goals', ['course' => $course], key('courses-goals-' . $course->id))
    </div>

    {{-- COMPONENTE DE LIVEWIRE - REQUIREMENTS --}}
    <div class="my-8">
        @livewire('instructor.courses-requirements', ['course' => $course], key('courses-requirements' . $course->id))
    </div>

    {{-- COMPONENTE DE LIVEWIRE - AUDIENCES --}}    
    <div>
        @livewire('instructor.courses-audiences', ['course' => $course], key('courses-audiences' . $course->id))
    </div>
    
</x-instructor-layout>