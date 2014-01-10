<?php 
//basic controller for managing content

class PostController extends BaseController {

    public function __construct()
    {
        //security filters
        $this->beforeFilter("auth",array("only"=>["create","edit","update","destroy"]));
        $this->beforeFilter("csrf",array("only"=>["store","update","destroy"]));
    }

    //display main html view
	public function index()
	{
        $posts = Post::orderBy("id","desc")->get();
        return View::make('posts.index',compact("posts"));
	}

    //display form for entering text
	public function create()
	{
        return View::make('posts.create');
	}

    //store blog content
	public function store()
	{
        $input = Input::all();
        //external validation service
        $validation = new services\Validators\PostValidator($input);
        
        $post = new Post;
        if($validation->isValid())
        {
            $post->save(
                [
                    $post["title"] = e($input["title"]),
                    $post["content"] = $input["content"],
                    $post["image_tag"] = $input["image_tag"]
                
                ]);

            return Redirect::to("posts");

        }

        return Redirect::back()->withInput()->withErrors($validation->errors);
	}

    //show one resource (one blog post)
	public function show($id)
	{
        $post = Post::find($id);
        return View::make('posts.show',compact("post"));
	}

    //edit one blog post
	public function edit($id)
	{
        $post = Post::find($id);
        Session::put("warning","Please sign in to proceed");
        return View::make('posts.edit',compact("post"));
	}

    //change blog entry
	public function update($id)
	{

		$input = Input::all();
        $post = Post::find($id);
        
        $validation = new services\Validators\PostValidator(Input::all());
        if($validation->isValid())
        {
            $post->save(
                [
                    $post["title"] = e($input["title"]),
                    $post["content"] = $input["content"],
                    $post["image_tag"] = $input["image_tag"]
                
                ]);
            $post->save();
            return Redirect::to("posts");
        }
        return Redirect::back()->withInput()->withErrors($validation->errors);
	}

    //delete resource
	public function destroy($id)
	{
        $posts = Post::all();
        $post = Post::find($id);

        if ($posts->count() > 4)
        {
            $post->delete();
            return Redirect::to("posts");
        }   
        else
            return Redirect::to("posts")->with("message","You can't delete everything"); 

	}

}
