<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\TypeDePublication;
use App\Publication;
use App\Commentaire;


class pagesController extends Controller
{

    function pageDaccueil(){
    	
    	return view('pages.pageDaccueil');
    }

    function typeDePublication($id){
    	$categorie = Categorie::all();
    	$typeDePublication = TypeDePublication::find($id);
    	$publication = Publication::where('idTypeDePublication',$id)->paginate(5);
    	return view('pages.typeDePublication',['categorie'=>$categorie,'typeDePublication'=>$typeDePublication,'publication'=>$publication]);
    }

    function publication($id){
        $publication = Publication::find($id);
        $populaire = Publication::where('important',1)->take(4)->get();
        $relatif = Publication::where('idTypeDePublication',$publication->idTypeDePublication)->take(4)->get();
        return view('pages.publication',['publication'=>$publication,'populaire'=>$populaire,'relatif'=>$relatif]);
    }

    function search(Request $request){
        $cles =  $request->cles;
        $publication = Publication::where('titre','like',"%$cles%")->orwhere('resume','like',"%$cles%")->orwhere('contenu','like',"%$cles%")->take(20)->paginate(5);
        return view('pages.search',['publication'=>$publication,'cles'=>$cles]);

    }

    function contacte(){
        return view('pages.contacte');
    }


    function introduction(){
        return view('pages.introduction');
    }
}
