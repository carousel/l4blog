@extends("layouts.master")

@section("content")
<?php $posts = Post::all(); $comments = Comment::all(); ?>
    <div class="widewrapper main">
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <article class="blog-post">
                        <header>
                            <h1>{{$post->title}}</h1>
                            <hr>
                            <hr>
                            <hr>
                            <div class="lead-image">
                                <div class="meta clearfix meta-info">
                      
                                    <div class="author">
                                        <i class="icon-user"></i>
                                        <span class="data">Alexander</span>
                                    </div>
                                    <div class="date">
                                        <i class="icon-calendar"></i>
                                        <span class="data">{{$posts[0]["created_at"]}}</span>
                                    </div>
                                    <div class="comments">
                                        <i class="icon-comments"></i>
                                        <span class="data"><a href="#comments">26 Comments</a></span>
                                    </div>                                
                                </div>
                            </div>
                        </header>
                        <div class="body">
                            

                        {{$post->content}}

                        </div>
                                <div class="clearfix">
                        {{link_to_route(
                                    "posts.edit"
                                    ,"Edit Post"
                                    ,[$post["id"]]
                                    ,["class"=>"btn btn-large btn-tales-two edit"]
                        )}}
                                </div>
                    </article>

                    <aside class="social-icons clearfix">
                        <a href="https://twitter.com/1012974" width="50" class="social-icon color-three">
                                <div class="inner-circle" ></div>
                                <i class="icon-twitter"></i>
                        </a>

                        <a href="https://plus.google.com/u/0/+MiroslavTrnini%C4%87/posts" rel="publisher" target="_top" style="text-decoration:none;" class="social-icon color-three">
                                <div class="inner-circle" ></div>
                                <i class="icon-google-plus"></i>
                        </a>    
        <a href="https://facebook.com/miroslav.trninci.58" class="social-icon color-three">
                                <div class="inner-circle" ></div>
                                <i class="icon-facebook"></i>

        </a>

                        </a>
                    </aside>

                    <aside class="comments" id="comments">
                        <hr>

                        <h2><i class="icon-comments"></i>
<?php $comment_count = Comment::where("post_id","=",$post["id"])->count()?>{{$comment_count }} Comments 
</h2>
                    @foreach($comments as $comment)
                        @if($post["id"] == $comment["post_id"])
                        <article class="comment">
                            <header class="clearfix">
                                <div class="meta">
                                    <h3><a href="#">{{$comment["name"]}}</a></h3>
                                    <span class="date">
                                        {{$comment["created_at"]}}
                                    </span>
                                    <span class="separator">
                                        -
                                    </span>
                                </div>
                            </header>
                             <div class="body">
                                {{$comment->comment}}
                            </div>
<br/>
                        </article>
                        @endif
                   @endforeach

                    </aside>

                    <aside class="create-comment" id="create-comment">

                       @include("partials.errors")
                        <h2><i class="icon-heart"></i> Add Comment</h2>

{{Form::open(array("route"=>"comments.store","method"=>"post"))}}
    {{Form::hidden("post_id",$post["id"])}}
    {{Form::label("name","Name")}}
    {{Form::text("name",null,["class"=>"form-control input-lg","placeholder"=>"name"])}}
    {{Form::label("email","Email")}}
    {{Form::email("email",null,["class"=>"form-control input-lg","placeholder"=>"email"])}}
    {{Form::label("comment","Comment")}}
    {{Form::textarea("comment",null,["class"=>"form-control input-lg","placeholder"=>"Add Your Comment..."])}}

<div class="buttons clearfix">
<button type="submit" class="btn btn-large btn-tales-one">Send</button>
{{Form::close()}}
                    </aside>
                </div>
                <aside class="col-md-4 blog-aside">
                    
                    <div class="aside-widget">
                        <header>
                            <h3>Read More...</h3>
                        </header>
                        <div class="body">
                            <ul class="tales-list">
                                <li><a href="/posts/{{$posts[0]->id}}">{{$posts[0]->title}}</a></li>
                                <li><a href="/posts/{{$posts[1]->id}}">{{$posts[1]->title}}</a></li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="aside-widget">
                        <header>
                            <h3>Popular</h3>
                        </header>
                        <div class="body">
                            <ul class="tales-list">
                                <li><a href="/posts/{{$posts[0]->id}}">{{$posts[0]->title}}</a></li>
                                <li><a href="/posts/{{$posts[1]->id}}">{{$posts[1]->title}}</a></li>
                            </ul>
                        </div>
                    </div>

                </aside>
            </div>
        </div>
    </div>
@stop
