<?php namespace services\Validators;

    class PostValidator extends Validator
    {
        public static $rules = [
               "title" => "required", 
               "content" => "required",         
               "image_tag" => "required"         
        ];

    }            
?>
