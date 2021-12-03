<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke()
    {
        $courses = Course::where('status', '3')->latest('id')->get()->take(12); //UTILIZAMOS METODO LATES PARA ORDENAR DE FORMA DESENDENTE
        // return $courses; //solo para revisar que te devuelve valores

        // return Course::find(3)->rating; //ESTO SOLO SE USA PARA VERIFICAR EL RATING ES PRUEBA

        return view('welcome', compact('courses'));
    }
}
