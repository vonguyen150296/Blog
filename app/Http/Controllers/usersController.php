<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;


class usersController extends Controller
{
    /////admin
    public function liste(){
    	$users = User::all();
    	return view('admin.users.liste',['users'=>$users]);
    }

    public function getAjouter(){
    	return view('admin.users.ajouter');

    }

    public function postAjouter(Request $request){
    	$this -> validate($request,[
    		'nom' => 'required|min:3|max:20',
            'email' => 'required|unique:users,email|min:8|max:30',
            'password' => 'required|min:8|max:15',
            'admin' => 'required'

    	],
    	[
    		'nom.required' => 'name is required',
    		'nom.min' => 'name have at least 3 word',
    		'nom.max' => 'name have maximum 20 word',
            'email.required' => 'email is required',
            'email.min' => 'email have at least 8 word',
            'email.max' => 'email have maximum 30 word',
            'email.unique' =>'email is exits',
            'password.required' => 'password is required',
            'password.min' => 'password have at least 8 word',
            'password.max' => 'password have maximum 15 word',
            'admin.required' => 'admin is required'
    		
    	]);

    	$users = new User;
    	$users->name = $request->nom;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->admin = $request->admin;	
    	$users->save();

    	return redirect('admin/users/ajouter')->with('notification','successfully!!!');

    }

 	public function getModifier($id){
    	$users = User::find($id);
    	return view('admin.users.modifier',['users'=>$users]);
    }

	public function postModifier(Request $request,$id){
         $users = User::find($id);
         if($request->email == $users->email){
                    $this -> validate($request,[
                    'nom' => 'required|min:3|max:20',
                    'email' => 'required|min:8|max:30',
                    'password' => 'required|min:8|max:15',
                    'admin' => 'required'

                ],
                [
                    'nom.required' => 'name is required',
                    'nom.min' => 'name have at least 3 word',
                    'nom.max' => 'name have maximum 20 word',
                    'email.min' => 'email have at least 8 word',
                    'email.max' => 'email have maximum 30 word',
                    'email.required' => 'email is required',
                    'password.required' => 'password is required',
                    'password.min' => 'password have at least 8 word',
                    'password.max' => 'password have maximum 15 word',
                    'admin.required' => 'admin is required'
                    
                ]);
         }
         else{
                    $this -> validate($request,[
                    'nom' => 'required|min:3|max:20',
                    'email' => 'required|unique:users,email|min:8|max:30',
                    'password' => 'required|min:8|max:15',
                    'admin' => 'required'

                ],
                [
                    'nom.required' => 'name is required',
                    'nom.min' => 'name have at least 3 word',
                    'nom.max' => 'name have maximum 20 word',
                    'email.required' => 'email is required',
                    'email.min' => 'email have at least 8 word',
                    'email.max' => 'email have maximum 30 word',
                    'email.unique' =>'email is exits',
                    'password.required' => 'password is required',
                    'password.min' => 'password have at least 8 word',
                    'password.max' => 'password have maximum 15 word',
                    'admin.required' => 'admin is required'
                    
                ]);
         }
          
        
        $users->name = $request->nom;
        $users->email = $request->email;
        $users->password = bcrypt($request->password);
        $users->admin = $request->admin;    
        $users->save();

        return redirect('admin/users/modifier/'.$id)->with('notification','successfully!!!');
    }


    
    public function supprimer($id){

        $users = User::find($id);
        $users -> delete();

        return redirect('admin/users/liste')->with('notification','successfully!!!');
    }
    /////utilisateur
    
    public function getLogin(){
        return view('pages.login');
    }

    public function postLogin(Request $request){
        $this -> validate($request,[
                    'email' => 'required|min:8|max:30',
                    'password' => 'required'

                ],
                [
                    'email.required' => 'email is required',
                    'email.min' => 'email have at least 8 word',
                    'email.max' => 'email have maximum 30 word',
                    'password.required' => 'password is required'
                ]);
        $email= $request['email'];
        $password= $request['password'];
        if (Auth::attempt(['email'=>$email, 'password'=>$password]))
          return redirect()->route('pageDaccueil');
        else
           return redirect('login')->with('notification','email or password is not correct!!!');

    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    public function gestion(){
        return view('pages.users');
    }

    public function postGestion(Request $request){
        $this -> validate($request,[
                'name' => 'required|min:3|max:20'
            ],
            [
                'nom.required' => 'name is required',
                'nom.min' => 'name have at least 3 word',
                'nom.max' => 'name have maximum 20 word'  
            ]);          
         
        Auth::user()->name = $request->name;
        if($request->checkpassword == "on"){
           $this -> validate($request,[
                'password' => 'required|min:8|max:15'
            ],
            [
                'password.required' => 'password is required',
                'password.min' => 'password have at least 8 word',
                'password.max' => 'password have maximum 15 word'    
            ]);
            if ($request->password == $request->passwordAgain) 
            {
                Auth::user()->password = bcrypt($request->password);
            }
            else
            {
                return redirect('users')->with('notification','Re-enter password not correct!!!');
            }          
           
        }
          
        Auth::user()->save();

        return redirect('users')->with('notification','successfully!!!');
    }

    public function getSignUp(){
        return view('pages.signUp');
    }

    public function postSignUp(Request $request){
         $this -> validate($request,[
                'name' => 'required|min:3|max:20',
                'password' => 'required|min:8|max:15',
                 'email' => 'required|unique:users,email|min:8|max:30'
            ],
            [
                'nom.required' => 'name is required',
                'nom.min' => 'name have at least 3 word',
                'nom.max' => 'name have maximum 20 word',
                'password.required' => 'password is required',
                'password.min' => 'password have at least 8 word',
                'password.max' => 'password have maximum 15 word',
                'email.required' => 'email is required',
                'email.min' => 'email have at least 8 word',
                'email.max' => 'email have maximum 30 word',
                'email.unique' =>'email is exits'
            ]);
        
        $users = new User; 
        $users->name = $request->name;
        
            if ($request->password == $request->passwordAgain) 
            {
                $users->password = bcrypt($request->password);
            }
            else
            {
                return redirect('signUp')->with('notification','Re-enter password not correct!!!');
            }          
           
        $users->email = $request->email;
        $users->admin = 0; 
        $users->save();

        return redirect('signUp')->with('notification','successfully!!!');
    }
}
