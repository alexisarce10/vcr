<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function getCompletedAttribute(){
        return $this->users->contains(auth()->user()->id);
    }

    //Relation one to one
    public function description(){
        return $this->hasOne('App\Models\Description');
    }

    //Relation one to many reverse
    public function unity(){
        return $this->belongsTo('App\Models\Unity');
    }

    public function platform(){
        return $this->belongsTo('App\Models\Platform');
    }

    //Relation many to many
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    //Relation one to one polymorph - resourceable es el método declarado en el modelo Resource
    public function resource(){
        return $this->morphOne('App\Models\Resource', 'resourceable');
    }

    //Relation one to many polymorph
    public function comments(){
        return $this->morphMany('App\Models\Comment', 'commentable');
    }

    public function reactions(){
        return $this->morphMany('App\Models\Reaction', 'reactionable');
    }
}
