<?php
//basic password recovery controller

class PasswordResetsController extends BaseController {

    //show html form for email 
	public function create()
	{
        return View::make('passwordresets.create');
	}

    //send confirmation token on users address
	public function store()
	{
        Password::remind(["email"=>Input::get("email")],function($message)
        {
            $message->subject("Your Password Reminder");
        });
        return Redirect::back()->withSuccess(true);
	}

    //password recovery
    public function reset($token)
    {
        return View::make("passwordresets.reset")->withToken($token);
    }

    public function postReset()
    {
        $credentials = array(
            "token" => Input::get("token"),
            "email" => Input::get("email"),
            "password" => Input::get("password"),
            "password_confirmation" => Input::get("password_confirmation")
        );

        Password::reset($credentials,function($user,$password)
        {
            $user->password = Hash::make($password);

            $user->save();


        });
            return Redirect::to("signin_form");
    }



}
