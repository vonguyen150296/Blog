<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    protected $table="commentaire";

    public function publication()
    {
    	return $this->belongsTo('App\Publication','idPublication','id');
    }

    public function users()
    {
    	return $this->belongsTo('App\User','idUser','id');
    }
}
