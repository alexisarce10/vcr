@extends('adminlte::page')

@section('title', 'VirtualClassRoom')

@section('content_header')
    <h1>Cursos Pendientes a Aprobar</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            {{session('info')}}
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NAME</th>
                        <th>ÁREA</th>
                        <th></th>
                    </tr>
                </thead>
                    @foreach ($courses as $course)
                        <tr>
                            <td>{{$course->id}}</td>
                            <td>{{$course->title}}</td>
                            <td>{{$course->area->name}}</td>
                            <td>
                                <a  class="btn btn-primary" href="{{route('admin.courses.show', $course)}}">Revisar</a>
                            </td>
                        </tr>
                    @endforeach

                <tbody>

                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="card-footer">
            {{$courses->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop