@extends('adminlte::page')

@section('title', 'VirtualClassRoom')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.areas.create')}}">Nueva Área</a>
    <h1>Lista de Áreas</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-danger">
            {{session('info')}}
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($areas as $area)
                        <tr>
                            <td>{{$area->id}}</td>
                            <td>{{$area->name}}</td>

                            <td width="10px">
                                <a class="btn btn-primary btn-sm" href="{{route('admin.areas.edit', $area)}}">Editar</a>
                            </td>
                            <td width="10px">
                                <form action="{{route('admin.areas.destroy', $area)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    
                                    <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop