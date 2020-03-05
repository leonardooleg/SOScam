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
                            <h1 class="title">Кабінет користувача</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Домашня сторінка</a></li>
                                <li> -</li>
                                <li>Користувач</li>
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
                            <a href="/panel/profile" class="edit" title="">Редагувати профіль <i
                                    class="ion-edit"></i></a>

                            <a id="navbarDropdown" href="{{ route('logout') }}" role="button" class="float-right"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                                <button type="button" class="btn btn-danger">{{ __('Вихід') }}</button>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <div class="avatar">
                                <img src="/storage/{{Auth::user()->avatar ?? '/images/clients/user.png'}}" alt="image">
                            </div>
                            <h3 class="name">{{Auth::user()->name}}</h3>
                            <ul class="info">
                                {{--<li class="phone"><i class="fa fa-phone"></i><a href="#" title="">+61 3 8376 6284</a>
                                </li>--}}
                                <li class="email"><i class="fa fa-envelope"></i><a href="#"
                                                                                   title="">{{Auth::user()->email}}</a>
                                </li>
                                {{--<li class="face"><i class="fa fa-facebook-square"></i><a href="#" title="">Facebook</a>
                                </li>
                                <li class="twiter"><i class="fa fa-twitter-square"></i><a href="#" title="">Twitter</a>
                                </li>--}}
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="flat-tabs style2" data-effect="fadeIn">
                            <ul class="menu-tab clearfix">
                                <li class="active"><a href="#"><i class="ion-navicon-round"></i>(3) Ваші відео</a></li>
                                <li class=""><a href="#"><i class="ion-chatbubbles"></i>(2)Ваші запити допомоги</a></li>
                            </ul><!-- /.menu-tab -->

                            <div class="content-tab listing-user">
                                <div class="content-inner active listing-list">
                                    @foreach($HaveVideos as $product)
                                        <div class="flat-product clearfix">
                                            <div class="featured-product" style="width: 320px">
                                                <img
                                                    src="https://drive.google.com/thumbnail?id={{$product->link}}&sz=w360-h237"
                                                    alt="image" style="" class="h-video ">
                                                <div class="time">
                                                    @if($product->published==1) Опублікований @else Не опобліковано @endif
                                                </div>
                                            </div>
                                            <div class="rate-product">
                                                <div class="link-review clearfix">
                                                    <div class="button-product float-left">
                                                        <button type="button" class="flat-button">
                                                            @if($product->city){{$product->city}}
                                                            & {{$product->country}}  @else{{$product->region}} @endif
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
                                                        <a href="#" class="review">( {{$product->viewed}} перегляди)</a>
                                                    </div>
                                                </div>
                                                <div class="info-product">
                                                    <h6 class="title"><a
                                                            href="/panel/have-soscam/{{$product->id}}/edit">{{$product->title}}</a>
                                                    </h6>
                                                    <p>{{$product->description_short}}</p>
                                                    <a href="#" class="heart">
                                                        <i class="ion-android-favorite-outline"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                    <div class="blog-pagination style2 text-center">
                                        <ul class="pagination pull-right">
                                            {{$HaveVideos->links()}}
                                        </ul><!-- /.flat-pagination -->
                                    </div>
                                </div>
                                <div class="content-inner">
                                    <div class="content-inner  listing-list">
                                        @foreach($SearchVideo as $product)
                                            <div class="flat-product clearfix">
                                                <div class="featured-product">
                                                    <img src="https://maps.googleapis.com/maps/api/staticmap?zoom=9&size=300x150&maptype=roadmap
&markers=color:red%7Clabel:S%7C{{$product->lat ?? 0}},{{$product->lng ?? 0}}&key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU"
                                                         alt="image">
                                                    <div class="time">
                                                        @if($product->published==1) Опублікований @else Не опобліковано @endif
                                                    </div>
                                                </div>
                                                <div class="rate-product">
                                                    <div class="link-review clearfix">
                                                        <div class="button-product float-left">
                                                            <button type="button" class="flat-button">
                                                                @if($product->city){{$product->city}}
                                                                & {{$product->country}}  @else{{$product->region}} @endif
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
                                                            <a href="#" class="review">( 2 перегляди )</a>
                                                        </div>
                                                    </div>
                                                    <div class="info-product">
                                                        <h6 class="title"><a
                                                                href="/panel/search-soscam/{{$product->id}}/edit">{{$product->title}}</a>
                                                        </h6>
                                                        <p>{{$product->maps}}</p>
                                                        <a href="#" class="heart">
                                                            <i class="ion-android-favorite-outline"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
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
