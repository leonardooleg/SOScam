@extends('layouts\app')

@section('content')

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/bootstrap.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/responsive.css">

    <!-- dropzone -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/dropzone.css">

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/animate.css">

    <!-- Favicon and touch icons  -->
    <link href="/icon/apple-touch-icon-48-precomposed.png" rel="apple-touch-icon-precomposed" sizes="48x48">
    <link href="/icon/apple-touch-icon-32-precomposed.png" rel="apple-touch-icon-precomposed">
    <link href="/icon/favicon.png" rel="shortcut icon">

    </head>
    <body class="header_sticky">
    <!-- Preloader -->
    <section class="loading-overlay">
        <div class="Loading-Page">
            <h2 class="loader">Loading</h2>
        </div>
    </section>

    <!-- Boxed -->
    <div class="boxed">


        <!-- Header -->
    @include('layouts.HeadMenu')

    <!-- Page title -->
        <div class="page-title parallax parallax1">
            <div class="section-overlay">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">User</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li> -</li>
                                <li><a href="index.html">Page</a></li>
                                <li> -</li>
                                <li>User</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->


        <section class="flat-row page-user bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="flat-user">
                            <a href="page-profile.html" class="edit" title="">Edit Profile <i class="ion-edit"></i></a>

                            <a id="navbarDropdown" href="{{ route('logout') }}" role="button" class="float-right"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                <button type="button" class="btn btn-danger">{{ __('Выход') }}</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <div class="avatar">
                                <img src="images/about/2.jpg" alt="image">
                            </div>
                            <h3 class="name">Kawhi Leonard</h3>
                            <ul class="info">
                                <li class="phone"><i class="fa fa-phone"></i><a href="#" title="">+61 3 8376 6284</a>
                                </li>
                                <li class="email"><i class="fa fa-envelope"></i><a href="#" title="">themesflat@gmail.com</a>
                                </li>
                                <li class="face"><i class="fa fa-facebook-square"></i><a href="#" title="">Facebook</a>
                                </li>
                                <li class="twiter"><i class="fa fa-twitter-square"></i><a href="#" title="">Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="flat-tabs style2" data-effect="fadeIn">
                            <ul class="menu-tab clearfix">
                                <li class="active"><a href="#"><i class="ion-navicon-round"></i>(3) Listings</a></li>
                                <li class=""><a href="#"><i class="ion-chatbubbles"></i>(3) Reviews</a></li>
                            </ul><!-- /.menu-tab -->

                            <div class="content-tab listing-user">
                                <div class="content-inner active listing-list">
                                    <div class="flat-product clearfix">
                                        <div class="featured-product">
                                            <img src="images/services/l1.jpg" alt="image">
                                            <div class="time">
                                                Now Close
                                            </div>
                                        </div>
                                        <div class="rate-product">
                                            <div class="link-review clearfix">
                                                <div class="button-product float-left">
                                                    <button type="button" class="flat-button"
                                                            onclick="location.href='#'">Restautrant
                                                    </button>
                                                </div>
                                                <div class="start-review">
                                            <span class="flat-start">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                                    <a href="#" class="review">( 2 reviewers )</a>
                                                </div>
                                            </div>
                                            <div class="info-product">
                                                <h6 class="title"><a href="#">San Antonio Restaurants</a></h6>
                                                <p>208 W 70th Street, New York, NY</p>
                                            </div>
                                        </div>
                                        <ul class="wrap-button float-right">
                                            <li>
                                                <button type="button" class="button" onclick="location.href='#'"><i
                                                        class="ion-edit"></i><span>Edit</span></button>
                                            </li>
                                            <li>
                                                <button type="button" class="button" onclick="location.href='#'"><i
                                                        class="ion-trash-a"></i><span>Delete</span></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="flat-product clearfix">
                                        <div class="featured-product">
                                            <img src="images/services/l2.jpg" alt="image">
                                            <div class="time">
                                                Now Close
                                            </div>
                                        </div>
                                        <div class="rate-product">
                                            <div class="link-review clearfix">
                                                <div class="button-product float-left">
                                                    <button type="button" class="flat-button bg-green"
                                                            onclick="location.href='#'">bar &amp; coffe
                                                    </button>
                                                </div>
                                                <div class="start-review">
                                            <span class="flat-start">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                                    <a href="#" class="review">( 2 reviewers )</a>
                                                </div>
                                            </div>
                                            <div class="info-product">
                                                <h6 class="title"><a href="#">Grand Prairie Restaurants</a></h6>
                                                <p>208 W 70th Street, New York, NY</p>

                                            </div>
                                        </div>
                                        <ul class="wrap-button float-right">
                                            <li>
                                                <button type="button" class="button" onclick="location.href='#'"><i
                                                        class="ion-edit"></i><span>Edit</span></button>
                                            </li>
                                            <li>
                                                <button type="button" class="button" onclick="location.href='#'"><i
                                                        class="ion-trash-a"></i><span>Delete</span></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="flat-product clearfix">
                                        <div class="featured-product">
                                            <img src="images/services/l3.jpg" alt="image">
                                            <div class="time bg-green">
                                                Now Open
                                            </div>
                                        </div>
                                        <div class="rate-product">
                                            <div class="link-review clearfix">
                                                <div class="button-product float-left">
                                                    <button type="button" class="flat-button bg-green"
                                                            onclick="location.href='#'">bar &amp; coffe
                                                    </button>
                                                </div>
                                                <div class="start-review">
                                            <span class="flat-start">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                                    <a href="#" class="review">( 2 reviewers )</a>
                                                </div>
                                            </div>
                                            <div class="info-product">
                                                <h6 class="title"><a href="#">Grand Prairie Restaurants</a></h6>
                                                <p>208 W 70th Street, New York, NY</p>
                                            </div>
                                        </div>
                                        <ul class="wrap-button float-right">
                                            <li>
                                                <button type="button" class="button" onclick="location.href='#'"><i
                                                        class="ion-edit"></i><span>Edit</span></button>
                                            </li>
                                            <li>
                                                <button type="button" class="button" onclick="location.href='#'"><i
                                                        class="ion-trash-a"></i><span>Delete</span></button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="blog-pagination style2 text-center">
                                        <ul class="flat-pagination clearfix">
                                            <li class="active"><a href="#">1</a></li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#">3</a></li>
                                            <li class="next">
                                                <a href="#">Next</a>
                                            </li>
                                        </ul><!-- /.flat-pagination -->
                                    </div>
                                </div>
                                <div class="content-inner">
                                    <div class="author-review content-listing">
                                        <div class="comments-area">
                                            <ol class="comment-list">
                                                <li class="comment">
                                                    <article class="comment-body clearfix">
                                                        <div class="comment-author">
                                                            <img src="images/services/c1.png" alt="image">
                                                        </div><!-- .comment-author -->
                                                        <div class="comment-text">
                                                            <div class="comment-metadata">
                                                                <h5><a href="#">Shaya Hill </a><span>on San Angelo Restaurants</span>
                                                                </h5>
                                                                <p class="day">12/01/2017</p>
                                                                <div class="flat-start">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </div>
                                                            </div><!-- .comment-metadata -->
                                                            <div class="comment-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco </p>
                                                            </div><!-- .comment-content -->
                                                        </div><!-- /.comment-text -->
                                                    </article><!-- .comment-body -->
                                                </li><!-- #comment-## -->
                                                <li class="comment">
                                                    <article class="comment-body clearfix">
                                                        <div class="comment-author">
                                                            <img src="images/services/c2.png" alt="image">
                                                        </div><!-- .comment-author -->
                                                        <div class="comment-text">
                                                            <div class="comment-metadata">
                                                                <h5><a href="#">Alex Poole </a><span>on Grand Prairie Restaurants</span>
                                                                </h5>
                                                                <p class="day">12/01/2017</p>
                                                                <div class="flat-start">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </div>
                                                            </div><!-- .comment-metadata -->
                                                            <div class="comment-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco </p>
                                                            </div><!-- .comment-content -->
                                                        </div><!-- /.comment-text -->
                                                    </article><!-- .comment-body -->
                                                </li><!-- #comment-## -->
                                                <li class="comment">
                                                    <article class="comment-body clearfix">
                                                        <div class="comment-author">
                                                            <img src="images/services/c3.png" alt="image">
                                                        </div><!-- .comment-author -->
                                                        <div class="comment-text">
                                                            <div class="comment-metadata">
                                                                <h5><a href="#">Anthony Jones </a><span>on San Antonio Restaurants</span>
                                                                </h5>
                                                                <p class="day">12/01/2017</p>
                                                                <div class="flat-start">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-half-o"></i>
                                                                </div>
                                                            </div><!-- .comment-metadata -->
                                                            <div class="comment-content">
                                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing
                                                                    elit, sed do eiusmod tempor incididunt ut labore et
                                                                    dolore magna aliqua. Ut enim ad minim veniam, quis
                                                                    nostrud exercitation ullamco </p>
                                                            </div><!-- .comment-content -->
                                                        </div><!-- /.comment-text -->
                                                    </article><!-- .comment-body -->
                                                </li><!-- #comment-## -->
                                            </ol><!-- .comment-list -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    @include('layouts.footer')

    <!-- Javascript -->
        <script src="/javascript/jquery.min.js"></script>
        <script src="/javascript/tether.min.js"></script>
        <script src="/javascript/bootstrap.min.js"></script>
        <script src="/javascript/jquery.easing.js"></script>
        <script src="/javascript/jquery-waypoints.js"></script>
        <script src="/javascript/dropzone.js"></script>
        <script src="/javascript/jquery.cookie.js"></script>
        <script src="/javascript/parallax.js"></script>
        <script src="/javascript/smoothscroll.js"></script>

        <script src="/javascript/main.js"></script>
    </body>
    </html>
@endsection
