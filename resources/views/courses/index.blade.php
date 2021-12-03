<x-app-layout>
    {{-- SECCION DE COURSE -- PORTADA    --}}
    <section class="bg-cover" style="background-image: url({{asset('img/cursos/online-gf0cafefe3_1920.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-white font-extrabold text-4xl">LOS MEJORES CURSOS Y AL MEJOR PRECIO EN VIRTUAL CLASSROOM | VCR</h1>
                <p class="text-white text-lg mt-2 mb-4">no te quedes atras y actualizate con VCR</p>
                
                {{-- EL BUSCADOR QUE ESTABA AQUI, SE PASO SEARCH, USANDO COMPONENTE DE LIVEWIRE --}}
                {{-- UTILIZAMOS UNA DIRECTIVA DE BLADE PARA LLAMARLO --}}
                @livewire('search')
            </div>
        </div>
    </section>

    {{-- USANDO DIRECTIVAS DE LIVEWIRE --}}
    @livewire('courses-index') <!-- este componente renderiza la vista course-index -->
    
</x-app-layout>