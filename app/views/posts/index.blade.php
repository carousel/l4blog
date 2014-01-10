@extends("layouts.master")

@section("content")
    <div class="widewrapper main">
@if(Session::has("message"))
    <h2 style="color:red">{{Session::get("message")}}</h2>
@endif
        <div class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    <div class="row">
                    @foreach($posts as $post)
                        <div class="col-md-6 col-sm-6">
                            <article class=" blog-teaser">
                                <header>
                                    <img src="http://www.lorempixum.com/g/150/150/{{$post["image_tag"]}}" alt="image_tag">
                                    <h3>
                                        {{$post["title"]}}

                                    </h3>
                                    <span class="meta">{{$post["created_at"]}}</span>
                                    <hr>
                                </header>
                                <div class="clearfix">
                        {{link_to_route(
                                        "posts.show"
                                        ,"Read More"
                                        ,[$post["id"]]
                                        , ["class"=>"btn btn-tales-one"]
                        )}}
                                </div>
                            </article>
                        </div>
                    @endforeach
                    </div>

                </div>
                <aside class="col-md-4 blog-aside">
                    
                    <div class="aside-widget">
                        <header>
                            <h3>Read More...</h3>
                        </header>
                        <div class="body">
                            <ul class="tales-list">
                            <?php $i = 0 ?>
                           @foreach($posts as $post)
                                @if($i++ < 3)
                                    <li>{{link_to_route(
                                            "posts.show"
                                            ,$post->title
                                            ,$post->id
                                    )}}</li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                
                    <div class="aside-widget">
                        <header>
                            <h3>Popular</h3>
                        </header>
                        <div class="body">
                            <ul class="tales-list">
                            <?php $i = 0 ?>
                           @foreach($posts as $post)
                                <?php $i = rand(1,3) ?>
                                @if($i++ < 3)
                                    <li>{{link_to_route(
                                            "posts.show"
                                            ,$post->title
                                            ,$post->id
                                    )}}</li>
                                @endif
                            @endforeach
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
@stop
