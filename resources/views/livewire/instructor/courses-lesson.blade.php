<div>
    @foreach ($section->lessons as $item)

        <article class="card mt-4" x-data="{open: false}">
            <div class="card-body">
                @if ($lesson->id == $item->id)
                    <form wire:submit.prevent="update">

                        {{-- NOMBRE --}}
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="lesson.name" type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                        </div>
                        @error('lesson.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        {{-- PLATAFORMAS --}}
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma: </label>
                            <select wire:model="lesson.platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- URL --}}
                        <div class="flex items-center mt-4">
                            <label class="w-32">URL:</label>
                            <input wire:model="lesson.url" type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                        </div>

                        @error('lesson.url')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        <div class="mt-4 flex justify-end">
                            <button type="button" class="btn btn-danger2" wire:click="cancel">Cancelar</button>
                            <button type="submit" class="btn btn-primary ml-2">Actualizar</button>
                        </div>

                    </form>
                @else
                    <header>
                        <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-indigo-500 mr-1"></i> Lección: {{$item->name}}</h1>
                    </header>

                    <div x-show="open">
                        <hr class="my-2">

                        <p class="text-sm">Plataforma: {{$item->platform->name}}</p>
                        <p class="text-sm">Enlace: <a class="text-blue-600" href="{{$item->url}}" target="_blank">{{$item->url}}</a></p>

                        <div class="my-2">
                            <button class="btn btn-primary text-sm" wire:click="edit({{$item}})">Editar</button>
                            <button class="btn btn-danger2 text-sm" wire:click="destroy({{$item}})">Eliminar</button>
                        </div>

                        {{-- COMPONENTE LIVE WIRE, INGRESANDO DESCRIPCION --}}
                        <div class="mb-4">
                            @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description-' . $item->id))
                        </div>

                        {{-- COMPONENTE LIVE WIRE, RECURSOS --}}
                        <div>
                            @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources-' . $item->id))
                        </div>
                    </div>
                @endif
            </div>
        </article>
        
    @endforeach

    <div class="mt-4" x-data="{open: false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="fas fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva Lección
        </a>

        <article class="card" x-show="open">
            <div class="card-body">
                <h1 class="text-xl font-bold mb-4">Agregar Nueva Lección</h1>

                <div class="mb-4">
                        {{-- NOMBRE --}}
                        <div class="flex items-center">
                            <label class="w-32">Nombre:</label>
                            <input wire:model="name" type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                        </div>
                        @error('name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        {{-- PLATAFORMAS --}}
                        <div class="flex items-center mt-4">
                            <label class="w-32">Plataforma: </label>
                            <select wire:model="platform_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                @foreach ($platforms as $platform)
                                    <option value="{{$platform->id}}">{{$platform->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- {{$platform_id}} PARA VERIFICAR  --}}
                        @error('platform_id')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                        {{-- URL --}}
                        <div class="flex items-center mt-4">
                            <label class="w-32">URL:</label>
                            <input wire:model="url" type="text" class="focus:ring-indigo-500 focus:border-indigo-500 block w-full pl-7 pr-12 sm:text-sm border-gray-300 rounded-md">
                        </div>

                        @error('url')
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
