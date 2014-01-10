<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {


	protected $guarded = array();
    protected $table = "users";

    public static $rules = array();
    
    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

	public function getReminderEmail()
	{
		return $this->email;
	}

}
