<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\TypeDePublication;

class ajaxController extends Controller
{
    public function typeDePublication($idCategorie){
    	$typeDePublication = TypeDePublication::where('idCategorie',$idCategorie)->get();
    	foreach ($typeDePublication as $ty ) {
    		echo "<option value='".$ty->id."'>".$ty->nom."</option>";
    	}
    }

   
}
