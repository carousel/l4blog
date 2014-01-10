<?php namespace services\Validators;

    class CommentValidator extends Validator
    {
        public static $rules = [
               "name" => "required", 
               "email" => "required",         
               "comment" => "required"         
        ];

    }            
?>
