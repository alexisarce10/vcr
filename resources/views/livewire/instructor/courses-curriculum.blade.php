<div>
    {{-- COMENTADO POR ACTUALIZACION EN SU RUTA --}}
    {{-- <x-slot name="course">
        {{$course->slug}}
    </x-slot> --}}

    <h1 class="text-xl font-bold">LECCIONES DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    {{-- {{$section}} PARA PROBAR SI MANDA PARAMETROS --}}

    @foreach ($course->unities as $item)
        <article class="card mb-6" x-data="{open: true}">
            <div class="card-body bg-gray-100">
                
                @if ($section->id == $item->id)

                    <form wire:submit.prevent="update">
                        <input wire:model="section.name" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="Ingrese el nombre de la sección">

                        @error('section.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                    </form>

                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Unidades: </strong>{{$item->name}}</h1>
                        <div>
                            <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i>
                            <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>

                    <div x-show="open">
                        @livewire('instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>
                @endif

            </div>
        </article>
    @endforeach

    <div x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="fas fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva Sección
        </a>

        <article class="card" x-show="open">
            <div class="card-body bg-gray-100">
                <h1 class="text-xl font-bold mb-4">Agregar Nueva Sección</h1>

                <div class="mb-4">
                    <input wire:model="name" type="text" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none shadow" placeholder="Escriba el nombre de la nueva sección">
                    @error('name')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="flex justify-end">
                    <button class="btn btn-danger2" x-on:click="open = false">Cancelar</button>
                    <button class="btn btn-primary ml-2" wire:click="store">Agregar</button>
                </div>
            </div>
        </article>
    </div>

</div>
