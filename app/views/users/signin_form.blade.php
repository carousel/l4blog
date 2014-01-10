@extends("layouts.master")
@section("content")
<?php $posts = Post::all();?>

            <div class="row">
                <div class="col-md-6 col-md-offset-3 tales-superblock" id="contact">
                    <h2>Sign In</h2>
        @include("partials.errors")
        @if(Session::has("already_registered"))
    <h4 class = "session-msg" >{{Session::get("already_registered")}}</h4>
        @endif
        @if(Session::has("warning"))
    <h4 class= "session-msg" >{{Session::get("warning")}}</h4>
        @endif
<hr>
{{Form::open(["url"=>"signin","method"=>"post"])}}
    {{Form::label("username","Username")}}
    {{Form::text("username",null,["class"=>"form-control input-lg","placeholder"=>"enter username"])}}
    {{Form::label("password","Password")}}
    {{Form::password("password",["class"=>"form-control input-lg","placeholder"=>"enter password"])}}
<hr>
    <span>{{link_to_route("password_resets.create","Did you forgot your password?",[],["class"=>"sign"])}}</span>
<br/>
    <span> {{link_to_route("signup_form","Don't have an account?",[],["class"=>"sign"])}}</span>&nbsp;&nbsp
    <hr>
    <div class="clearfix">
    {{Form::submit("Signin",["class"=>"btn btn-large btn-tales-one" ])}}
    </div>
{{Form::close()}}
                    
                </div>
        </div>
@stop
