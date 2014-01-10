@extends("layouts.master")

@section("content")
<div class="container">
    <div class="row">
        <div class="col-md-5 col-md-offset-3 tales-superblock" id="contact">
    <h2 class="reset">Reset Your Password</h2>
    {{Form::open(["route"=>"password_resets.store","method"=>"POST"])}}
        {{Form::label("email","Email Address")}}
        {{Form::email("email",null,["class"=>"form-control","required"=>true,"placeholder"=>"Enter Your Email Address"])}}
    <br/>
    {{Form::submit("Reset",[ "class"=>"btn btn-large btn-tales-one remind" ])}}
    {{Form::close()}}

    @if(Session::has("error"))
        {{Session::get("reason")}}
    @elseif(Session::get("success"))
        <span class="sign">Please check your email</span>
    @endif

        </div>
    </div>
</div>
@stop
