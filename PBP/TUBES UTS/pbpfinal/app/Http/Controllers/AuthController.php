<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pegawai;

class AuthController extends Controller
{
    public function getLogin(){
    	return view('pages.login');
    }
    public function getRegister(){
    	return view('pages.register');
    }
    public function postLogin(Request $req){
    	dd('Login Succesfully');
    }
    public function postReg(Request $req){
    	//cara 1
    	// $this->validate($req, [
    	// 	'name' => 'required|min:3',
    	// 	'email' => 'required|email|unique:pegawai,email',
    	// 	'username' => 'required|min:3|unique:pegawai,username',
    	// 	'password' => 'required|min:6',
    	// 	'password_conf' => 'required|min:6|same:password',
    	// 	'level' => 'required|integer|between:1,2',
    	// ]);
    	//cara 2
    	$rules = [
			'name' => 'bail|required|min:3',
			'email' => 'bail|required|email|unique:pegawai,email',
			'username' => 'bail|required|min:3|unique:pegawai,username',
			'password' => 'bail|required|min:6',
			'password_conf' => 'bail|required|same:password',
			'level' => 'bail|required|integer|between:1,2',
    	];
    	$customMessage = [
    		'required' => 'The :attribute field is required',
    		'same' => 'Password Confirmation should match with the password'
    	];
    	$this->validate($req,$rules, $customMessage);
    	pegawai::create([
    		'name' => $req->name_lengkap,
    		'email' => $req->email,
    		'username' => $req->username,
    		'password' => $req->password,
    		'level' => $req->level
    	]);
    	return view('welcome');
    }
}
