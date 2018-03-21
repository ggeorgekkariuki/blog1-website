<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class WelcomeAgain extends Mailable
{
    use Queueable, SerializesModels;

    /* 
        **MARKDOWN LESSON**

    Laravel offers styling for emails too.
    A few steps:

    1. php artisan make:mail <name> --markdown='resources/emails/<name>'
        This will create a path for the new markdown
        To ensure that changes are reflected refresh the tinker
    2. In tinker use the following command
        Mail::to($user = App\User::first()) 
        -> send (new App\Mail\<name>($user));
    3. Note the parameter used here. It was defined in the first 
        App\Mail\<name>. All public variables are globally avaialble for 
        this class
    4. However, the resources/emails/<name> is only a template. To customise 
        the file (emails.<name>), use the following command:
        php artisan vender:publish --tag=laravel-mail
        * only the ones with the tag laravel will be imported
    5. In resourses/views/vender you will find styling for the html and markdowns.
        To make any changes, go to config.app find the 'theme' and rename it to 
        the new css file in the views/vender/mail/html/themes

     */

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcome-again');
    }
}
