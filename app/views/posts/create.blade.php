@extends("layouts.master")

@section("content")
<?php $posts = Post::all() ?>
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
                            <h1>Create New Post</h1>
                            <div class="lead-image">
                        </header>

                    <aside class="create-comment" id="create-comment">

{{Form::open(array("route"=>"posts.store","method"=>"post"))}}
    {{Form::label("title","Title")}}
    {{Form::text("title",null,["class"=>"form-control input-lg","placeholder"=>"Post Title"])}}
    {{Form::label("content","Content")}}
    {{Form::textarea("content",null,["class"=>"form-control input-lg","placeholder"=>"Write Something Nice..."])}}
<br/>
    {{Form::label("image_tag","Select image tag")}}
<br/>
{{Form::select("image_tag",array("nature"=>"nature","food"=>"food","sports"=>"sports","city"=>"city","people"=>"people","transport"=>"transport"),["class"=>"form-control"])}}

<div class="buttons clearfix">
    {{Form::submit("Save",["class"=>"btn btn-large btn-tales-one" ])}}
{{Form::close()}}
                            </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
@stop

