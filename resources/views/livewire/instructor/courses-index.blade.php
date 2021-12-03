<div class="container py-8">
    <!-- This example requires Tailwind CSS v2.0+ -->
    <x-table-responsive>
        
        {{-- BUSCADOR --}}
        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search" class="flex-1 border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="Busque el nombre de un cursos...">

            <a class="btn btn-danger2 ml-2" href="{{route('instructor.courses.create')}}">Crear nuevo Curso</a>
        </div>

        @if ($courses->count())
             {{-- CUERPO DE LA TABLA --}}
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Name
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Matriculados
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Calificación
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Estatus
                        </th>
                        <th scope="col" class="relative px-6 py-3">
                            <span class="sr-only">Edit</span>
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">

                    @foreach ($courses as $course)
                        <tr>
                            {{-- SECCION DATOS DEL NAME --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        @isset($course->image)
                                            <img class="h-10 w-10 rounded-full object-cover object-center"
                                            src="{{Storage::url($course->image->url)}}"
                                            alt="">
                                        @else
                                            <img class="h-10 w-10 rounded-full object-cover object-center"
                                            src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500"
                                            alt="">
                                        @endisset
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{$course->title}}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <strong>Área: </strong>{{$course->area->name}}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            <strong>Año: </strong> {{$course->grade->name}}
                                        </div>
                                    </div>
                                </div>
                            </td>

                            {{-- SECCION DATOS MATRICULADOS --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{-- CANTIDAD DE ALUMNOS MATRICULADOS --}}
                                <div class="text-sm text-gray-900 text-center">{{$course->student->count()}}</div>
                                <div class="text-sm text-gray-500 text-center">Alumnos Matriculados</div>
                            </td>

                            {{-- SECCION DE CALIFICACION --}}
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900 flex items-center">
                                    {{$course->rating}}
                                    <ul class="flex text-sm ml-2">
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 1 ? 'yellow' : 'gray'}}-400"></i>
                                            {{-- <i class="fas fa-star text-yellow-400"></i> --}}
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 2 ? 'yellow' : 'gray'}}-400"></i>
                                            {{-- <i class="fas fa-star text-yellow-400"></i> --}}
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 3 ? 'yellow' : 'gray'}}-400"></i>
                                            {{-- <i class="fas fa-star text-yellow-400"></i> --}}
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating >= 4 ? 'yellow' : 'gray'}}-400"></i>
                                            {{-- <i class="fas fa-star text-yellow-400"></i> --}}
                                        </li>
                                        <li class="mr-1">
                                            <i class="fas fa-star text-{{$course->rating == 5 ? 'yellow' : 'gray'}}-400"></i>
                                            {{-- <i class="fas fa-star text-yellow-400"></i> --}}
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-sm text-gray-500">Valoración del Curso</div>
                            </td>

                            {{-- SECCION DE ESTATUS --}}
                            <td class="px-6 py-4 whitespace-nowrap">

                                @switch($course->status)
                                    @case(1)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                            Borrador
                                        </span>
                                        @break
                                    @case(2)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            Revisión
                                        </span>
                                        @break
                                    @case(3)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            Publicado
                                        </span>
                                        @break    
                                    @default
                                        
                                @endswitch

                            </td>                        
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{route('instructor.courses.edit', $course)}}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                            </td>
                        </tr>
                    @endforeach

                    <!-- More people... -->
                </tbody>
            </table>                

            {{-- PAGINACION --}}
            <div class="px-6 py-4">
                {{$courses->links()}}
            </div>
        @else
            <div class="px-6 py-4">
                No existen registros coincidentes.
            </div>
        @endif
                    
    </x-table-responsive>
</div>
