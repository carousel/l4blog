<?php namespace services\Validators;

    abstract class  Validator
    {
        //user input
        protected $attributes;
        public $errors;

        public function __construct($attributes)
        {
            $this->attributes = $attributes;
        }

        public function isValid()
        {
            $validation = \Validator::make($this->attributes,static::$rules);
            if($validation->passes()) return true;
            $this->errors = $validation->messages();
            return false;
        }    
    }
?>
