<div>
    <article class="card" x-data="{open: false}">
        <div class="card-body bg-gray-100">
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer">Descripción de la Lección</h1>
            </header>

            <div x-show="open">
                <hr class="my-2">

                @if ($lesson->description)
                    <form wire:submit.prevent="update">
                        {{-- <label>Nombre:</label> --}}
                        <textarea wire:model="description.name" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md mb-4"></textarea>
                        @error('description.name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="destroy" class="btn btn-danger2 text-sm" type="button">Eliminar</button>
                            <button class="btn btn-primary text-sm ml-2" type="submit">Actualizar</button>
                        </div> 
                    </form>
                @else
                    <div>
                        {{-- <label>Nombre:</label> --}}
                        <textarea wire:model="name" class="block w-full focus:ring-indigo-500 focus:border-indigo-500 border-gray-300 rounded-md mb-4" placeholder="Ingrese una descripción de la Lección..."></textarea>
                        @error('name')
                            <span class="text-sm text-red-500">{{$message}}</span>
                        @enderror

                        <div class="flex justify-end">
                            <button wire:click="store" class="btn btn-primary text-sm ml-2">Agregar</button>
                        </div> 
                    </div>
                @endif
            </div>
        </div>
    </article>
</div>
