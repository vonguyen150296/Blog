<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table="categorie";

    public function typeDePublication(){

    	return $this->hasMany('App\TypeDePublication','idCategorie','id');
    }
    
    public function publication(){
    	return $this->hasManyThrough('App\Publication','App\TypeDePublication','idCategorie','idTypeDePublication','id');
    }
}
