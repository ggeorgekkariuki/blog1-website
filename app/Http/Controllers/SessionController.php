<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{

    /* 
        If you are an authenticated user, you are not allowed to look at
        these methods except destroy aka log out
     */ 
    public function __construct() {

        $this -> middleware ('guest', ['except' => 'destroy'] );

    }
    
    //Log in
    public function create() {

        return view ('login.create');
        
    }
    
    //Log in
    public function store() {
        // dd()->all();

        // Attempt to authenticate the user and Sign them in
        // If the user does not exist, return back to that page
       if (! (auth()->attempt(request(['email', 'password'])) ) ) {
       
             // Redirect to the home page
           return back() -> withErrors([
               'message' => 'Please check credentials'
           ]);

       }

       //On successful login, flash this message
        session() -> flash('message', 'Welcome back!');

        //Only a user with valid credentials will be redirected to the homepage
        return redirect() -> home();
        
    }

    //Log out
    public function destroy() {

        auth()->logout();

        return redirect()->home();        
    }
    
}