<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    //
    public function tareas(){

    	return $this->belongsToMany('App\Tarea','tarea_usuarios');
    }
}
