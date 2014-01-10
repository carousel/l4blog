<?php
//basic controller for managing users login

use services\Mailers\UserMailer;

class UserController extends BaseController {


    protected $mailer;

    public function __construct(UserMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    //display form for signin
	public function signin_form()
	{
        return View::make("users.signin_form");
	}

    //signin action
	public function signin()
	{
        
        $input = Input::only("username","password");
        //external validation service
        $validation = new services\Validators\SigninValidator($input);

        if(Session::has("username"))
        {
            Session::put("already_registered",Session::get("username") . " is already signed in:");
            return Redirect::back();
        }
        if($validation->isValid() && Auth::attempt($input)) 
        {
        
            Session::put("username",$input["username"]);
            return Redirect::intended(); 
        }
            
        Session::put("warning","Please sign up to proceed:");
        Session::forget("username");
        return Redirect::back()->withInput()->withErrors($validation->errors);
		
	}

    //display html form for signup
	public function signup_form()
	{
        return View::make("users.signup_form");
	}
    
    //signup action
	public function signup()
	{
    
        $input = Input::all();

        //external validation service
        $validation = new services\Validators\SignupValidator($input);
        
        $user = new User;
        if($validation->isValid())
        {
            $user->save(
                [
                    $user["username"] = $input["username"],
                    $user["email"] = $input["email"],
                    $user["password"] = Hash::make($input["password"])
                
                ]);
            
            $this->mailer->send($input,"Welcome to laravel4 blog"); 

            Auth::login($user,true);
            Session::put("username",$input["username"]);
            return Redirect::to("posts");
        }


        return Redirect::back()->withInput()->withErrors($validation->errors);

	}

    //logout/signout action
    public function signout()
    {
        Auth::logout();
        Session::forget("username");
        Session::forget("warning");
        Session::forget("already_registered");
        return Redirect::to("posts");
    }

}
