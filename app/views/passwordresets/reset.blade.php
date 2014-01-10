@extends("layouts.master")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 tales-superblock" id="contact">
    <h2 class="reset">Reset Your Password</h2>

{{Form::open()}}
    {{Form::hidden("token",$token)}}

    {{Form::label("email","Email")}}
    {{Form::text("email",null,["class"=>"form-control input-lg","placeholder"=>"enter email"])}}

    {{Form::label("password","New Password")}}
    {{Form::password("password",["class"=>"form-control input-lg","placeholder"=>"Enter New Password"])}}
    {{Form::label("password_confirmation")}}
    {{Form::password("password_confirmation",["class"=>"form-control input-lg","placeholder"=>"Confirm New Password"])}}
    <hr>
    <div class="clearfix">
    {{Form::submit("Reset Password",["class"=>"btn btn-large btn-tales-one remind" ])}}
    </div>
{{Form::close()}}
    @if(Session::has("error"))
       <p> {{Session::get("reason")}}</p>
    @endif


        </div>
    </div>
</div>
@stop
