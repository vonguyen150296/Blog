<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commentaire;
use App\Publication;
use App\User;
use Illuminate\Support\Facades\Auth;

class commentaireController extends Controller
{
    public function supprimer($id,$idPublication){

        $commentaire = Commentaire::find($id);
        $commentaire -> delete();
        return redirect('admin/publication/modifier/'.$idPublication)->with('notification','successfully!!!');
    }

    public function commenter($id,Request $request ){
    	$this -> validate($request,[
    		'contenu' => 'required|min:5|max:200'

    	],
    	[
    		'contenu.required' => 'comment is required',
    		'contenu.min' => 'comment has at least 5 words',
    		'contenu.max' => 'comment has maximum 200 words'
    		
    	]);
    	
    	$publication = Publication::find($id);
    	$commentaire = new Commentaire;
    	$commentaire->idPublication = $id;
    	$commentaire->idUser = Auth::user()->id;
    	$commentaire->contenu = $request->contenu;
    	$commentaire->save();
    	return redirect("publication/$id/".$publication->titreSansAccent.".php")->with('notification','successfully!!!');
    }
}
