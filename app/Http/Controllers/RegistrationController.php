<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class RegistrationController extends Controller
{
    //Go to a Registration Page
    public function create(){

    	return view('registration.create');

    }

    //Save the new user in the database

    public function store() {
    	// dd(request()->all());
    	//Validate the form
    	$this->validate(request(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed']);

    	//Create and save the user
		$request = request()->all();
		$request['password'] = bcrypt($request['password']);
    	$user = User::create($request);

    	//Sign them in
		//This is an Auth helper function
		//It does not require importation of the class
    	auth()->login($user);

    	//Redirect to the home page
    	return redirect()->home();

    }
}
