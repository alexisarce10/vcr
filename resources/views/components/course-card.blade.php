@props(['course'])

{{-- SE REMPLAZA LA CLASE POR CONTAINER CARD ==> class="bg-white shadow-lg rounded overflow-hidden" --}}
<article class="card flex flex-col">                    
    <img class="h-36 w-full object-cover" src="{{Storage::url($course->image->url)}}" alt="">   <!-- ESTE METODO RECUPERA LA URL DONDE SE CUENTRA LA IMAGEN -->
    {{-- <img class="h-36 w-full object-cover" src="{{asset('img/home/geometry-g433965423_640.jpg')}}" alt=""> --}}
    <div class="card-body flex-1 felx flex-col"> <!-- CLASE REMPLAZADA POR CARD-BODY ==> class="px-6 py-4" -->
        <h1 class="card-title">{{Str::limit($course->title, 35)}}</h1> <!-- CLASE REMPLAZADA POR CARD-TITLE ==> class="text-xl text-gray-700 mb-2 leading-6" -->
        {{-- <h1 class="text-xl text-gray-700 mb-2 leading-6">Cursito de Prueba dasdasd dasdasd</h1> --}}
        <p class="text-gray-500 text-sm mb-2 mt-auto">Prof: {{$course->teacher->name}}</p>
        {{-- <p class="text-gray-500 text-sm mb-2">Prof: Pedrito Landauro</p> --}}
        <div class="flex">
            <ul class="flex text-sm">
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

            <p class="text-sm text-gray-500 ml-auto">
                <i class="fas fa-users"></i>
                ({{$course->student_count}})
                {{-- (0) --}}
            </p>                            
        </div>

        @if ($course->price->value == 0)
            <p class="my-2 px-2 inline-flex text-gree-800 font-bold rounded-full bg-green-100 text-green-800">GRATIS</p>
        @else
        <p class="my-2 text-gray-500 font-bold">S/. {{$course->price->value}}</p>   
        @endif

        <a href="{{route('courses.show', $course)}}" class="btn btn-primary btn-block"> <!-- block text-center w-full antes y despues de mt-4 => p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300 -->
            Más Información
        </a>
    </div>
</article>