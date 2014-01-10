<?php namespace services\Validators;

    class SignupValidator extends Validator
    {
        public static $rules = [
               "username" => "required|unique:users", 
               "email" => "required",         
               "password" => "required|confirmed",
        ];

    }            
?>
