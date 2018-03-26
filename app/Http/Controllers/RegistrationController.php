<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\Welcome;
use App\Http\Requests\RegistrationForm;

class RegistrationController extends Controller
{
    //Go to a Registration Page
    public function create(){

    	return view('registration.create');

    }

    //Save the new user in the database

    public function store(RegistrationForm $form) {

		/*
				 **FORM REQUEST OBJECTS AND CLASSES LESSON**

		This lesson is about dedicating a class to do the backend stuff
		for a cleaner code.

		1. Use command
			php artisan make:request <name> 
		   to make a new form request class
		2. Find the new file at App/Http/Requests/<name>
		3. Move the validation rules that were in this method
		 */
    	// dd(request()->all());
		$form -> persist();

		/*
		 	** SESSIONS METHOD **
		A session is a message that displays on a screen giving short information
		about an activity a user has engaged in. It can hold data that may be needed
		elsewhere. 

		Otherwise, we can use a FLASH to display a message for ONLY one page which is 
		great for status messages that displays a set message

		Once the user registers, we are redirected to the home page with the posts,
		We plant another session() method in the layouts.header file.
		*/

		session() -> flash('message', 'Thank you for signing up to this website');

    	//Redirect to the home page
    	return redirect()->home();

    }
}
