<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Mail;

class RegistrationForm extends FormRequest
{
    /*
                **FORM REQUEST OBJECTS AND CLASSES LESSON**

    This lesson is about dedicating a class to do the backend stuff
    for a cleaner code.

    1. Use command
        php artisan make:request <name> 
    2. Find the new file at App/Http/Requests/<name>
    3. Move any validation rules in the Registration Controller's store
        method to the RegistrationForm's rules method

    */

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the VALIDATION RULES that apply to the request BEFORE it is submitted
     * If the form validation fails, it will redirect to the previous page
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required|confirmed'
        ];
    }

    public function persist()
    {
    // All the code for Registration can come here making the Controller cleaner

    //Create and save the user
    //The request method returns an array with key-value pairs saved as request
    $request = request()->all();
    //
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
    //Remember to uncomment. 
    //User name and pass are in config/mail
    //Paste to .env
    // \Mail::to($user) -> send (new Welcome ($user));
    }
}
