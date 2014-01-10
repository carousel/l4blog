@extends("layouts.master")

<?php $posts = Post::all() ?>
@section("content")
    <script src="/js/tinymce/js/tinymce/tinymce.js"></script>
    <script>
            tinymce.init({selector:'textarea'});
    </script>
    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blog-main">
                    <article class="blog-post">
                    @include("partials.errors")
                        <header>
                            <h1>Edit Post</h1>
                            <div class="lead-image">
                        </header>

                    <aside class="create-comment" id="create-comment">

{{Form::model($post,["method"=>"patch","route"=>["posts.update",$post->id]])}}
    {{Form::label("title","Edit Title")}}
    {{Form::text("title",null,["class"=>"form-control input-lg"])}}
    {{Form::label("content","Edit Content")}}
    {{Form::textarea("content",null,["class"=>"form-control input-lg","placeholder"=>"Write Something Nice..."])}}
<br/>
    {{Form::label("image_tag","Select image tag")}}
<br/>
{{Form::select("image_tag",array("nature"=>"nature","food"=>"food","sports"=>"sports","city"=>"city","people"=>"people","transport"=>"transport"),["class"=>"form-control"])}}
    <button type="submit" class="btn btn-large btn-tales-one">Save</button>
{{Form::close()}}

{{Form::model($post,["method"=>"delete","route"=>["posts.update",$post->id]])}}
    <button type="submit" class="btn btn-large btn-tales-two">Delete</button>
{{Form::close()}}
                            </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@stop

