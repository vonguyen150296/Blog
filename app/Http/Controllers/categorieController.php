<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;



class categorieController extends Controller
{
    public function liste(){
    	$categorie = Categorie::all();
    	return view('admin.categorie.liste',['categorie'=>$categorie]);
    }

    public function getAjouter(){
    	return view('admin.categorie.ajouter');

    }

    public function postAjouter(Request $request){
    	$this -> validate($request,[
    		'nom' => 'required|min:3|max:30',
            'nom' => 'unique:categorie,nom'

    	],
    	[
    		'nom.required' => 'name is required',
    		'nom.min' => 'name have at least 3 word',
    		'nom.max' => 'name have maximum 30 word',
            'nom.unique' => 'this name is exits'
    		
    	]);

    	$categorie = new Categorie;
    	$categorie->nom = $request->nom;
    	$categorie->nomSansAccent = str_slug($request->nom,'-');
    	$categorie->save();

    	return redirect('admin/categorie/ajouter')->with('notification','successfully!!!');

    }

 	public function getModifier($id){
    	$categorie = Categorie::find($id);
    	return view('admin.categorie.modifier',['categorie'=>$categorie]);
    }

	public function postModifier(Request $request,$id){
         $categorie = Categorie::find($id);
         if($request->nom == $categorie->nom){
                    $this -> validate($request,[
                    'nom' => 'required|min:3|max:30'

                ],
                [
                    'nom.required' => 'name is required',
                    'nom.min' => 'name have at least 3 word',
                    'nom.max' => 'name have maximum 30 word'
                    
                ]);
         }
         else{
                    $this -> validate($request,[
                    'nom' => 'required|min:3|max:30',
                    'nom' => 'unique:categorie,nom'

                ],
                [
                    'nom.required' => 'name is required',
                    'nom.min' => 'name have at least 3 word',
                    'nom.max' => 'name have maximum 30 word',
                    'nom.unique' => 'this name is exits'
                    
                ]);
         }
          

        
        $categorie->nom = $request->nom;
        $categorie->nomSansAccent = str_slug($request->nom,'-');
        $categorie->save();

        return redirect('admin/categorie/modifier/'.$id)->with('notification','successfully!!!');
    }


    
    public function supprimer($id){

        $categorie = Categorie::find($id);
        $categorie -> delete();

        return redirect('admin/categorie/liste')->with('notification','successfully!!!');
    }
}
