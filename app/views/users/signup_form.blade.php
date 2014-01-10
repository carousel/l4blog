@extends("layouts.master")
@section("content")
<?php $posts = Post::all();?>

            <div class="row">
                <div class="col-md-6 col-md-offset-3 tales-superblock" id="contact">
            @include("partials.errors")
                    <h2>Sign Up</h2>
{{Form::open(["url"=>"signup","method"=>"post"])}}
    {{Form::label("username","Username")}}
    {{Form::text("username",null,["class"=>"form-control input-lg","placeholder"=>"enter username"])}}
    {{Form::label("email","Email")}}
    {{Form::text("email",null,["class"=>"form-control input-lg","placeholder"=>"enter email"])}}
    {{Form::label("password","Password")}}
    {{Form::password("password",["class"=>"form-control input-lg","placeholder"=>"enter password"])}}
    {{Form::label("password_confirmation")}}
    {{Form::password("password_confirmation",["class"=>"form-control input-lg","placeholder"=>"confirm password"])}}
    <hr>
    <div class="clearfix">
    {{Form::submit("Sign Up",["class"=>"btn btn-large btn-tales-one" ])}}
    </div>
{{Form::close()}}
                    
                </div>
        </div>
@stop
