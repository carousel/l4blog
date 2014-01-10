<?php

class Comment extends Eloquent {
	protected $guarded = array();

    public function post()
    {
        $this->belongsTo("Post");
    }

	public static $rules = array();
}
