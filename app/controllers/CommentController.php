<?php
//basic comments controller

class CommentController extends BaseController {

    public function __construct()
    {   //attach filters on comment form
        $this->beforeFilter("csrf",array("only"=>["store"]));
    }

    //save comments
	public function store()
	{
		$input = Input::all();
        $validation = new services\Validators\CommentValidator($input);
        $comment = new Comment;
        if($validation->isValid())
        {
            $comment->save([
                    $comment["name"] = $input["name"],
                    $comment["email"] = $input["email"],
                    $comment["comment"] = e($input["comment"]),
                    $comment["post_id"] = $input["post_id"]
            
            ]);
            return Redirect::back();
        }

        return Redirect::back()->withInput()->withErrors($validation->errors);
	}

}
