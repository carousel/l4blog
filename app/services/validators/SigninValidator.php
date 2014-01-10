<?php namespace services\Validators;

    class SigninValidator extends Validator
    {
        public static $rules = [
               "username" => "required", 
               "password" => "required"
        ];

    }            
?>
