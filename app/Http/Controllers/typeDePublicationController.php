<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\TypeDePublication;


class typeDePublicationController extends Controller
{
    public function liste(){
    	$typeDePublication = TypeDePublication::all();
       return view('admin.typeDePublication.liste',['typeDePublication'=>$typeDePublication]);
    }

    public function getAjouter(){
    	$categorie = Categorie::all();
    	return view('admin.typeDePublication.ajouter',['categorie'=>$categorie]);

    }

    public function postAjouter(Request $request){
    	$this -> validate($request,[
    		'nom' => 'required|min:3|max:50',
            'nom' => 'unique:typeDePublication,nom'

    	],
    	[
    		'nom.required' => 'name is required',
    		'nom.min' => 'name have at least 3 word',
    		'nom.max' => 'name have maximum 50 word',
            'nom.unique' => 'this name is exits'
    		
    	]);

    	$typeDePublication = new TypeDePublication;
    	$typeDePublication->nom = $request->nom;
    	$typeDePublication->nomSansAccent = str_slug($request->nom,'-');
    	$typeDePublication->idCategorie = $request->categorie;
    	$typeDePublication->save();
    	
    	return redirect('admin/typeDePublication/ajouter')->with('notification','successfully!!!');

    }

 	public function getModifier($id){
 		$categorie = Categorie::all();
    	$typeDePublication = TypeDePublication::find($id);
    	return view('admin.typeDePublication.modifier',['categorie'=>$categorie,'typeDePublication'=>$typeDePublication]);
    }

	public function postModifier(Request $request,$id){
         $typeDePublication = TypeDePublication::find($id);
         if($request->nom == $typeDePublication->nom){
                    $this -> validate($request,[
                    'nom' => 'required|min:3|max:50',

                ],
                [
                    'nom.required' => 'name is required',
                    'nom.min' => 'name have at least 3 word',
                    'nom.max' => 'name have maximum 50 word',
                    
                ]);
         }
         else{
                    $this -> validate($request,[
                    'nom' => 'required|min:3|max:50',
                    'nom' => 'unique:typeDePublication,nom'

                ],
                [
                    'nom.required' => 'name is required',
                    'nom.min' => 'name have at least 3 word',
                    'nom.max' => 'name have maximum 50 word',
                    'nom.unique' => 'this name is exits'
                    
                ]);
         }
          
        $typeDePublication->nom = $request->nom;
    	$typeDePublication->nomSansAccent = str_slug($request->nom,'-');
    	$typeDePublication->idCategorie = $request->categorie;
    	$typeDePublication->save();

        return redirect('admin/typeDePublication/modifier/'.$id)->with('notification','successfully!!!');
    }


    
    public function supprimer($id){

        $typeDePublication = TypeDePublication::find($id);
        $typeDePublication -> delete();

        return redirect('admin/typeDePublication/liste')->with('notification','successfully!!!');
    }
}
