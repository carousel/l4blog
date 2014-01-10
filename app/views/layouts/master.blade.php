
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<?php $count = Post::all();$comments = Comment::all(); $user = User::all() ?>
<head>
    <meta charset="utf-8">
    <title>Tales - Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <!-- Bootstrap styles -->
    <link rel="stylesheet" href="/css/libs/bootstrap/bootstrap.css">
    <link rel="stylesheet" href="/css/libs/bootstrap/bootstrap-theme.css">

    <!-- Styles -->
    <link rel="stylesheet" href="/css/styles-greyred.css" id="theme-styles">
    <!-- Font-Awesome -->
    <link href="//netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.css" rel="stylesheet">

    <!-- Google Webfonts -->
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600|PT+Serif:400,400italic' rel='stylesheet' type='text/css'>-->


    <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie8.css">        
        <script src="js/libs/google/html5-3.6-respond-1.1.0.min.js"></script>
    <![endif]-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    <script>window.jQuery || document.write('<script src="js/libs/jquery/jquery-1.9.1.min.js"><\/script>')</script>

</head>
<body>
    <header>
        <div class="widewrapper masthead">
            <span id="main-logo">Web 2.0 cornerstone application implemented with Laravel4</span>
                @if(Session::has("username"))
        <span class = "span-session">{{"welcome" . " " . Session::get("username")}}</span>
                @endif
            <div class="container">
                <div id="mobile-nav-toggle" class="pull-right">
                    <a href="#" data-toggle="collapse" data-target=".tales-nav .navbar-collapse">
                        <i class="icon-reorder"></i>
                    </a>
                </div>

                <nav class="pull-right tales-nav">
                    <div class="collapse navbar-collapse">
                        <ul class="nav nav-pills navbar-nav">
                          
                            <li>
                                {{link_to_route("posts.create","New Post")}}
                            </li>
                            <li>
                                {{link_to("signin_form","Sign In")}}
                            </li>
                            <li>
                                {{link_to("signup_form","Sign Up")}}
                            </li>
                            @if(Session::has("username"))
                                <li>
                                    {{link_to("signout","Sign Out")}}
                                </li>
                            @endif
                        </ul>
                    </div>
                </nav>        

            </div>
        </div>

        <div class="widewrapper subheader">
                {{link_to_route("posts.index","Home",null,["class"=>"home"])}}
        </div>
    </header>


    @yield("content")

    <footer>
        <div class="widewrapper footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 footer-widget">
                        <h3> <i class="icon icon-cog"></i>Statistics</h3>

                        <span>Here is some useful statistics:</span>

                        <div class="stats">
                            <div class="line">
                            <span class="counter">{{$count->count()}}</span>
                                <span class="caption">Articles</span>
                            </div>
                            <div class="line">
                                <span class="counter">{{$comments->count()}} </span>
                                <span class="caption">Comments</span>
                            </div>
                            <div class="line">
                                <span class="counter">{{$user->count()}}</span>
                                <span class="caption">Authors</span>
                            </div>                    
                        </div>
                    </div>

                    <div class="col-md-4 footer-widget">
                        <h3><i class="icon icon-envelope"></i>Contact Me</h3>

                        <span>I'm happy to hear from you. Thoughts, feedback, critique - all welcome! <br/>Drop me a line at:</span>
                            <a href="mailto:miroslav.trninic@gmail.com">&nbsp;miroslav.trninic@gmail.com</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="widewrapper copyright">
            <div class="container">
                <a href="http://carousel.github.io">miroslav trninic</a>, Copyright 2013
            </div>
        </div>
    </footer>
    
    <script src="js/libs/bootstrap/bootstrap.min.js"></script>
    <script src="js/libs/modernizr/modernizr.js"></script>

</body>
</html>
