<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\TypeDePublication;
use App\Publication;
use App\Commentaire;
use App\User;

class publicationController extends Controller
{
    public function liste(){
        
    	$publication = Publication::all();
    	$categorie = Categorie::all();
    	$typeDePublication = TypeDePublication::all();

    	return view('admin.publication.liste',['categorie'=>$categorie,'typeDePublication'=>$typeDePublication,'publication'=>$publication]);
    }

    public function getAjouter(){
    	$categorie = Categorie::all();
    	$typeDePublication = TypeDePublication::all();
    	return view('admin.publication.ajouter',['categorie'=>$categorie,'typeDePublication'=>$typeDePublication]);

    }

    public function postAjouter(Request $request){
    	$this -> validate($request,[
    		'nom' => 'required|min:3|max:30'

    	],
    	[
    		'nom.required' => 'name is required',
    		'nom.min' => 'name have at least 3 word',
    		'nom.max' => 'name have maximum 30 word'
    		
    	]);
     
    	$publication = new Publication;
    	$publication->titre = $request->nom;
    	$publication->titreSansAccent = str_slug($request->nom,'-');
    	$publication->contenu = $request->contenu;
    	$publication->resume = $request->resume;
    	$publication->important = $request->prominent;
    	$publication->idTypeDePublication = $request->typeDePublication;

        if($request->hasFile('image'))
        {
            $fichier = $request->file('image');
            $format = $fichier->getClientOriginalExtension();
                if($format !='jpg' && $format != 'png' && $format != 'jpeg'){
                    return redirect('admin/publication/ajouter')->with('notification','enter file image');
                }
            $nom = $fichier->getClientOriginalName();
            $image = str_random(5)."_".$nom;
            while(file_exists("upload/publication/".$image)){
                $image = str_random(5)."_".$nom;
            }
            $fichier->move("upload/publication",$image);
            $publication ->image = $image;
            
        }
        else
        {
            $publication ->image ="";
        }

    	$publication->save();
    	
        return redirect('admin/publication/ajouter')->with('notification','successfully!!!');

    }

 	public function getModifier($id){
 		$categorie = Categorie::all();
        $typeDePublication =TypeDePublication::all();
        $commentaire = Commentaire::all();
        $user = User::all();
    	$publication = Publication::find($id);
    	return view('admin.publication.modifier',['categorie'=>$categorie,'typeDePublication'=>$typeDePublication,'publication'=>$publication]);
    }


    
	public function postModifier(Request $request,$id){
         $publication = Publication::find($id);
          $this -> validate($request,[
            'nom' => 'required|min:3|max:30'

        ],
        [
            'nom.required' => 'name is required',
            'nom.min' => 'name have at least 3 word',
            'nom.max' => 'name have maximum 30 word'
            
        ]);

        
        $publication->titre = $request->nom;
        $publication->titreSansAccent = str_slug($request->nom,'-');
        $publication->contenu = $request->contenu;
        $publication->resume = $request->resume;
        $publication->important = $request->prominent;
        $publication->idTypeDePublication = $request->typeDePublication;
        
          if($request->hasFile('image'))
        {
            $fichier = $request->file('image');
            $format = $fichier->getClientOriginalExtension();
                if($format !='jpg' && $format != 'png' && $format != 'jpeg'){
                    return redirect('admin/publication/modifier/'.$id)->with('notification','enter file image');
                }
            $nom = $fichier->getClientOriginalName();
            $image = str_random(5)."_".$nom;
            while(file_exists("upload/publication/".$image)){
                $image = str_random(6)."_".$nom;
            }
            $fichier->move("upload/publication",$image);
            unlink("upload/publication/".$publication->image);
            $publication ->image =$image;
        }
        $publication->save();

        return redirect('admin/publication/modifier/'.$id)->with('notification','successfully!!!');
    }


    
    public function supprimer($id){

        $publication = Publication::find($id);
        $publication -> delete();

        return redirect('admin/publication/liste')->with('notification','successfully!!!');
    }

    
}

