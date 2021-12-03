<div>

    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    <div class="bg-gray-200 py-4 mb-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class="focus:outline-none bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters"> 
                <i class="fas fa-archway text-xs mr-2"></i>
                Todos los Cursos
            </button>
        
            <!-- Dropdown Areas == CATEGORÍA-->
            <div class="relative mr-4" x-data="{ open: false }">
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true"> <!-- en el metodo x-on:click puede !open o puede ser true si se usa x-on:click.away -->
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Áreas
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                    @foreach ($areas as $area)

                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" wire:click="$set('area_id', {{$area->id}})" x-on:click="open = false">{{$area->name}}</a>
                        
                    @endforeach
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

            <!-- Dropdown  NIVELES-->
            <div class="relative mr-4" x-data="{ open: false }">
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true"> <!-- en el metodo x-on:click puede !open o puede ser true si se usa x-on:click.away -->
                    <i class="fas fa-chart-line text-sm mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   

                    @foreach ($levels as $level)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" wire:click="$set('area_id', {{$level->id}})" x-on:click="open = false">{{$level->name}}</a>
                    @endforeach

                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

            <!-- Dropdown  GRADOS - GRADES -->
            <div class="relative mr-4" x-data="{ open: false }">
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true"> <!-- en el metodo x-on:click puede !open o puede ser true si se usa x-on:click.away -->
                    <i class="fas fa-layer-group text-sm mr-2"></i>
                    Grados
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   

                    @foreach ($grades as $grade)
                        <a class="cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white" wire:click="$set('area_id', {{$grade->id}})" x-on:click="open = false">{{$grade->name}}</a>
                    @endforeach

                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

            <!-- Dropdown ESTADO - AUN EN DESARROLLO-->
            <div class="relative" x-data="{ open: false }">
                <button class="px-4 text-gray-700 block h-12 rounded-lg overflow-hidden focus:outline-none bg-white shadow" x-on:click="open = true"> <!-- en el metodo x-on:click puede !open o puede ser true si se usa x-on:click.away -->
                    <i class="fas fa-charging-station text-sm mr-2"></i>
                    Estado
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!-- Dropdown Body -->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white border rounded shadow-xl" x-show="open" x-on:click.away="open = false">   
                    <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">Settings</a>
                    <div class="py-2">
                        <hr></hr>
                    </div>
                    <a href="#" class="transition-colors duration-200 block px-4 py-2 text-normal text-gray-900 rounded hover:bg-purple-500 hover:text-white">    
                        Logout
                    </a>
                </div>
                <!-- // Dropdown Body -->
            </div>
            <!-- // Dropdown -->

        </div> 
    </div>

    {{-- PARA MOSTRAR LOS CURSOS --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">

        {{-- CON ESTE METODO INGRESAMOS A LA RECUPERACIO0N DE IMAGENES --}}
        @foreach ($courses as $course)
            <x-course-card :course="$course" />
        @endforeach

        {{-- @foreach ($courses as $course) --}}
        <!-- 
            <article class="bg-white shadow-lg rounded overflow-hidden">                    
                {{-- <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">   <!-- ESTE METODO RECUPERA LA URL DONDE SE CUENTRA LA IMAGEN --> --}}
                <img class="h-36 w-full object-cover" src="{{asset('img/home/geometry-g433965423_640.jpg')}}" alt="">
                <div class="px-6 py-4">
                    {{-- <h1 class="text-xl text-gray-700 mb-2 leading-6">{{Str::limit($course->title, 40)}}</h1> --}}
                    <h1 class="text-xl text-gray-700 mb-2 leading-6">Cursito de Prueba dasdasd dasdasd</h1>
                    {{-- <p class="text-gray-500 text-sm mb-2">Prof: {{$course->teacher->name}}</p> --}}
                    <p class="text-gray-500 text-sm mb-2">Prof: Pedrito Landauro</p>
                    <div class="flex">
                        <ul class="flex text-sm">
                            <li class="mr-1">
                                {{-- <i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}400"></i> --}}
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li class="mr-1">
                                {{-- <i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}400"></i> --}}
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li class="mr-1">
                                {{-- <i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}400"></i> --}}
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li class="mr-1">
                                {{-- <i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}400"></i> --}}
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                            <li class="mr-1">
                                {{-- <i class="fas fa-star text-{{$course->rating >= 5 ? 'yellow' : 'gray'}}400"></i> --}}
                                <i class="fas fa-star text-yellow-400"></i>
                            </li>
                        </ul>

                        <p class="text-sm text-gray-500 ml-auto">
                            <i class="fas fa-users"></i>
                            {{-- ({{$course->students_count}}) --}}
                            (0)
                        </p>                            
                    </div>
                    <button class="w-full mt-4 p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300">
                        Button
                    </button>
                </div>
            </article> -->
        {{-- @endforeach --}}

    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-8 mb-8">
        {{$courses->links()}}
    </div>

</div>
