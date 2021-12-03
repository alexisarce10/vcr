<x-instructor-layout :course="$course">

    
    
    <h1 class="text-2xl font-bold">Información del Curso</h1>
    
    <hr class="mt-2 mb-6">
        
    {{-- ABRIMOS UN FORMLULARIO CON LARAVEL COLECTIVE --}}
    {!! Form::model($course, ['route' => ['instructor.courses.update', $course], 'method' => 'put', 'files' => true]) !!}
                            
        @include('instructor.courses.partials.form')
        
        <div class="flex justify-end">
            {!! Form::submit('Actualizar información', ['class' => 'btn btn-primary']) !!}
        </div>
        
    {!! Form::close() !!}

    {{-- utilizando SLOT con nombre --}}
    <x-slot name="js">
        {{-- CDN PARA CK_EDITOR --}}
        <script src="https://cdn.ckeditor.com/ckeditor5/31.0.0/classic/ckeditor.js"></script>      

        <script src="{{asset('js/instructor/courses/form.js')}}"></script>
    </x-slot>

</x-instructor-layout>