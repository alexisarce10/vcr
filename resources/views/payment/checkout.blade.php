<x-app-layout> 
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 py-12">
        <h1 class="text-gray-500 text-3xl font-bold">Detalle del Pedido</h1>

        <div class="card text-gray-600">
            <div class="card-body">
                <article class="flex items-center">
                    <img class="h-12 w-12 object-cover" src="{{Storage::url($course->image->url)}}" alt="">
                    <h1 class="text-lg ml-2">{{$course->title}}</h1>
                    <p class="text-xl font-bold ml-auto">
                        {{-- S/. {{$course->price->value}} --}}
                        S/. {{number_format($course->price->value, 2, '.', '')}}
                    </p>
                </article>

                <div class="flex justify-end mt-2 mb-4">
                    <a href="{{route('payment.pay', $course)}}" class="btn btn-primary">Comprar este Curso</a>
                </div>

                <hr>
                <p class="text-sm mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus assumenda, obcaecati quibusdam ratione nam officiis error quaerat, et cumque distinctio, facilis voluptates. Nobis cupiditate provident numquam veritatis, deleniti quam quas! 
                    <a class="text-red-500 font-bold" href="">Términos y condiciones</a>
                </p>
            </div>
        </div>
    </div>
</x-app-layout>