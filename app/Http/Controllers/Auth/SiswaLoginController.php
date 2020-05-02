<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class SiswaLoginController extends Controller
{
       use AuthenticatesUsers;

    protected $redirectTo = '/siswa/home';

    public function _construct()
    {
    	$this->middleware('guest:siswa')->except('logout')->except('index');
    }

    public function index(){
    	return view('siswa.home');

    }
    public function showLoginForm()
    {
    	return view('siswa.auth.login');
    }
    public function showRegisterForm()
    {
    	return view('siswa.auth.register');
    }
    public function username()
    {
    	return 'username';
    }

    protected function guard()
    {
    	return Auth::guard('siswa');
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'username' => 'required|string|unique:guru',
    		'email'  => 'required|string|email|unique:siswa',
    		'password' => 'required|string|min:6|confirmed'

    	]);

    	\App\SiswaLogin::create($request->all());
    	return redirect()->route('siswa.registerform')->with('success','Succes Register');
    }

}
