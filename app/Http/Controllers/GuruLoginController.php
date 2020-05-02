<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
class GuruLoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/guru/home';

    public function _construct()
    {
    	$this->middleware('guest:guru')->except('logout')->except('index');
    }

    public function index(){
    	return view('guru.home');

    }
    public function showLoginForm()
    {
    	return view('guru.auth.login');
    }
    public function showRegisterForm()
    {
    	return view('guru.auth.register');
    }
    public function username()
    {
    	return 'username';
    }

    protected function guard()
    {
    	return Auth::guard('guru');
    }

    public function register(Request $request)
    {
    	$request->validate([
    		'username' => 'required|string|unique:guru',
    		'email'  => 'required|string|email|unique:guru',
    		'password' => 'required|string|min:6|confirmed'

    	]);

    	\App\Guru::create($request->all());
    	return redirect()->route('guru.registerform')->with('success','Succes Register');
    }

}
