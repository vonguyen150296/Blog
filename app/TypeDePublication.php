<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeDePublication extends Model
{
    protected $table = "typeDePublication";

    public function categorie()
    {
    	return $this->belongsTo('App\TypeDePublication','idCategorie','id');
    }
    public function publication()
    {
    	return $this->hasMany('App\Publication','idTypeDePublication','id');
    }
}
