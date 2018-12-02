<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    protected $table = "publication";
    
    public function typeDePublication()
    {
    	return $this->belongsTo('App\TypeDePublication','idTypeDePublication','id');
    }
 

    public function commentaire()
    {
    	return $this->hasMany('App\Commentaire','idPublication','id');
    }
}
