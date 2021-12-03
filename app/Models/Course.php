<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $withCount = ['student', 'review']; //CANTIDAD DE ESTUDIANTES POR CURSO

    const BORRADOR = 1;
    const REVISION = 2;
    const PUBLICADO = 3;

    // metodo para calificacion por alumnos
    public function getRatingAttribute(){

        //COLOCAREMOS UNA CONDICIONAL PARA RATING MINIMO
        if($this->review_count){
            return round($this->review->avg('rating'), 1); //metodo avg es para los promedios //UTILIZAMOS ROUND PARA REDONDEAR DECIRMALES
        }else{
            return 5;
        }
    }

    // METODO UTILIZANDO QUERYS SCOPES

    // METODO PARA AREAS = CATEGORY
    public function scopeArea($query, $area_id){
        if($area_id){
            return $query->where('area_id', $area_id);
        }
    }

    // METODO PARA LEVELS
    public function scopeLevel($query, $level_id){
        if($level_id){
            return $query->where('area_id', $level_id);
        }
    }

    // METODO PARA GRADES
    public function scopeGrade($query, $grade_id){
        if($grade_id){
            return $query->where('area_id', $grade_id);
        }
    }


    //METODO PARA UTILIZAR EL SLUG EN LA URL
    public function getRouteKeyName(){
        
        return "slug";
    }

    //Relation one to one
    public function observation(){
        return $this->hasOne('App\Models\Observation');
    }

    //Relation one to many
    public function review(){
        return $this->hasMany('App\Models\Review');
    }

    public function requirements(){
        return $this->hasMany('App\Models\Requirement');
    }

    public function goals(){
        return $this->hasMany('App\Models\Goal');
    }

    public function audiences(){
        return $this->hasMany('App\Models\Audience');
    }

    public function unities(){
        return $this->hasMany('App\Models\Unity');
    }



    //Relation one to many reverse
    public function teacher(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function area(){
        return $this->belongsTo('App\Models\Area');
    }

    public function grade(){
        return $this->belongsTo('App\Models\Grade');
    }

    public function price(){
        return $this->belongsTo('App\Models\Price');
    }

    public function level(){
        return $this->belongsTo('App\Models\Level');
    }



    //Relation many to many
    public function student(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relation one to one polymorph
    public function image(){
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    //Relation Many Through - two parameters: final table, intermediate table
    public function lesson(){
        return $this->hasManyThrough('App\Models\Lesson', 'App\Models\Unity');
    }

}
