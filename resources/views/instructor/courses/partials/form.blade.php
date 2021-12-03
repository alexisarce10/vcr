<div class="mb-4">
    {!! Form::label('title', 'Título del Curso:') !!}
    {!! Form::text('title', null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('title') ? ' border-red-600' : '')]) !!}

    @error('title')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

{{-- MONTRANDO EL SLUG --}}
<div class="mb-4">
    {!! Form::label('slug', 'Slug del Curso:') !!}
    {!! Form::text('slug', null, ['readonly' => 'readonly' ,'class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('slug') ? ' border-red-600' : '')]) !!}

    @error('slug')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

{{-- MOSTRANDO EL SUBTITULO --}}
<div class="mb-4">
    {!! Form::label('subtitle', 'SubTítulo del Curso:') !!}
    {!! Form::text('subtitle', null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('subtitle') ? ' border-red-600' : '')]) !!}

    @error('subtitle')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

{{-- MOSTRANDO EL SUBTITULO --}}
<div class="mb-4">
    {!! Form::label('description', 'Descripción del Curso:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-input block w-full mt-1 rounded-lg' . ($errors->has('description') ? ' border-red-600' : '')]) !!}

    @error('description')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
</div>

{{-- MOSTRANDO LA CALIFICACION --}}
<div class="grid grid-cols-4 gap-4">
    <div>
        {!! Form::label('area_id', 'Area:') !!}
        {!! Form::select('area_id', $areas, null, ['class' => 'form-input block w-full mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('level_id', 'Niveles:') !!}
        {!! Form::select('level_id', $levels, null, ['class' => 'form-input block w-full mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('grade_id', 'Año:') !!}
        {!! Form::select('grade_id', $grades, null, ['class' => 'form-input block w-full mt-1 rounded-lg']) !!}
    </div>
    <div>
        {!! Form::label('price_id', 'Precio:') !!}
        {!! Form::select('price_id', $prices, null, ['class' => 'form-input block w-full mt-1 rounded-lg']) !!}
    </div>
</div>

{{-- PARA IMAGEN DEL CURSO --}}
<h1 class="text-2xl font-bold mt-8 mb-2">Imagen del curso</h1>

<div class="grid grid-cols-2 gap-4">
    <figure>
        @isset($course->image)
            <img id="picture" class="w-full h-64 object-cover object-center" src="{{Storage::url($course->image->url)}}" alt="">
        @else
            <img id="picture" class="w-full h-64 object-cover object-center" src="https://images.pexels.com/photos/5940721/pexels-photo-5940721.jpeg?auto=compress&cs=tinysrgb&dpr=1&w=500" alt="">
        @endisset
    </figure>

    <div>
        <p class="mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium ad consectetur aliquam tenetur. Est nemo quo, aperiam illum, placeat iure ducimus distinctio quam dolore molestias, consequatur deserunt itaque quisquam eos.</p>
        {!! Form::file('file', ['class' => 'form-input w-full' . ($errors->has('file') ? ' border-red-600' : ''), 'id' => 'file', 'accept' => 'image/*']) !!}

        @error('file')
        <strong class="text-xs text-red-600">{{$message}}</strong>
    @enderror
    </div>
</div>