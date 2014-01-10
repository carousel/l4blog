<?php namespace services\Mailers;
    
    class Mailer
    {
        public function send($user,$subject)
        {   
            \Mail::send("emails.welcome",[],function($message) use($user,$subject)
            {
                $message->to($user["email"])
                        ->subject($subject);
            });
        }
    };


?>
