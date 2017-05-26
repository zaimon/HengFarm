<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\LoginRequest;
use Auth;
use App\User;
use App\Projects;

class UserController extends Controller{

  public function getIndex(){
      $rs = Projects::where('status','=','1')->count();
      return view('index')->with('data',$rs);
  }

	public function getLogin(){
		if(Auth::check()){
      $rs = Projects::where('status','=','1')->count();
      return redirect()->intended('index');
  	}else{
      $alert = ['type'=>'warning','title'=>'แจ้งเตือน','message'=>'ไม่สามารถ เข้าสู่ระบบได้ '];
    	return view('login')->with('alert',$alert);
  	}
  }

  public function postLogin(LoginRequest $req){
  	$username = $req->input('username');
  	$password = $req->input('password');
  
  	if (Auth::attempt(['username' => $username, 'password' => $password])) {
      $rs = Projects::where('status','=','1')->count();
  		return redirect()->intended('index')->with('data',$rs);
      // return $rs;
  	}else{
      $alert = ['type'=>'warning','title'=>'แจ้งเตือน','message'=>'ไม่สามารถ เข้าสู่ระบบได้'];
      return redirect('login')->with('alert',$alert);
    }
  }

  public function logout(){
    	Auth::logout();
    	return redirect('login');
 	}
}
