<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
    	return view('admin.pageLogin');
    }


    public function postLogin(Request $request){
    	$email= $request['email'];
    	$password= $request['password'];
        
    	if (Auth::attempt(['email'=>$email, 'password'=>$password]))
            if(Auth::user()->admin == 1)
    		return view('admin.heritage.index');
            else
            return redirect('admin/login')->with('notification','email or password not correct');   
        else
        	return redirect('admin/login')->with('notification','email or password not correct');
    }



    public function logout()
    {
    	Auth::logout();
    	return redirect()->route('getLogin');
    }
    
}
