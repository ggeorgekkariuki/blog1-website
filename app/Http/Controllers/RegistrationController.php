<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;

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

		/* 
				*MAILING LESSON*

		We want to send a an email to every successful user who logs in
		These are the steps to do so 
		1. Import the mail facade
		2. Create a new email class using php artisan make:mail <name>
		3. Add the <name> to the 'send ()' method
		4. Go to the new page App/Mail/<name>
		5. Create a resources file for the email
		6. View the config/mail and .env files for MAIL_ for details
			Use these details to view the email and set up as required
		7. Pass any arguments into this facade as configured in the Mail/<name>

		*/
		
		\Mail::to($user) -> send (new Welcome ($user));

    	//Redirect to the home page
    	return redirect()->home();

    }
}
