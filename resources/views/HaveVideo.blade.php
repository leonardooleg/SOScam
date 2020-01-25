@extends('layouts\app')

@section('content')
    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/bootstrap.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/responsive.css">

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


        <div class="page-title parallax parallax1">
            <div class="section-overlay">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Наявні відео ДТП</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">На головну</a></li>
                                <li> -</li>
                                <li>Наявні відео</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <section class="flat-row section-filter bg-theme">
            <div class="container widget widget-form style2">
                <form novalidate="" class="filter-form row clearfix" id="filter-form" method="post" action="#">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-6">
                                <p class="book-notes icon">
                                    <input type="text" placeholder="Вкажіть місце пригоди" name="question" required="">
                                    <i class="ion-ios-search-strong"></i>
                                </p>
                            </div>
                            <div class="col-lg-6">
                                <p class="book-form-select icon">
                                    <select class=" dropdown_sort">
                                        <option value="">Всі категорії</option>
                                        <option value="">Наявні відео</option>
                                        <option value="">Допоможіть знайти</option>
                                    </select>
                                    <i class="fa fa-angle-down"></i>
                                </p>
                            </div>
                            <div class="col-lg-12">
                                <p class="book-form-address icon">
                                    <input type="text" placeholder="Адреса" name="address" required="">
                                    <i class="ion-android-locate"></i>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <p class="location">Радіус <i class="ion-location float-right"></i></p>
                        <p class="input-location form-filter">
                        <span class="filter">
                            <input id="ex8" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                   data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                        </span>
                        </p>
                        <p class="form-submit text-center">
                            <button class="flat-button">Пошук</button>
                        </p>
                    </div>
                </form>
            </div>
        </section>

        <!-- Blog posts -->
        <section class="main-content page-listing-full">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="flat-select clearfix">
                            <div class="float-left width50 clearfix">
                                <div class="one-three showing">
                                    <p><span>16</span> наявних відео</p>
                                </div>
                                <div class="one-three more-filter">
                                    <ul class="unstyled">
                                        <li class="current"><a href="#" class="title">Розширений фільтр <i
                                                    class="fa fa-angle-right"></i></a>
                                            <ul class="unstyled">
                                                <li class="en">
                                                    <input type="checkbox" id="wifi" name="category">
                                                    <label for="wifi">Wifi</label>
                                                </li>
                                                <li class="en">
                                                    <input type="checkbox" id="smoking" name="category">
                                                    <label for="smoking">Smoking allowed</label>
                                                </li>
                                                <li class="en">
                                                    <input type="checkbox" id="onl" name="category">
                                                    <label for="onl">Online Reservation</label>
                                                </li>
                                                <li class="en">
                                                    <input type="checkbox" id="parking" name="category"
                                                           checked="checked">
                                                    <label for="parking">Parking street</label>
                                                </li>
                                                <li class="en">
                                                    <input type="checkbox" id="event" name="category">
                                                    <label for="event">Events</label>
                                                </li>
                                                <li class="en">
                                                    <input type="checkbox" id="in" name="category" checked="checked">
                                                    <label for="in">Elevator in building</label>
                                                </li>
                                                <li class="en">
                                                    <input type="checkbox" id="card" name="category">
                                                    <label for="card">Credit Card Payment</label>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="one-three sortby">
                                    <ul class="unstyled">
                                        <li class="current"><a href="#" class="title">Сортувати: Випадково <i
                                                    class="fa fa-angle-right"></i></a>
                                            <ul class="unstyled">
                                                <li class="en"><a href="#" title=""><i class="fa fa-caret-right"></i>Open
                                                        Now</a></li>
                                                <li class="en"><a href="#" title=""><i class="fa fa-caret-right"></i>Most
                                                        reviewed</a></li>
                                                <li class="en"><a href="#" title=""><i class="fa fa-caret-right"></i>Top
                                                        rated</a></li>
                                                <li class="en"><a href="#" title=""><i class="fa fa-caret-right"></i>Random</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="wrap-flat-product clearfix col-md-12">
                                @foreach($products as $product)
                                    <div class="flat-product">
                                        <div class="featured-product">
                                            <img src="images/services/1.jpg" alt="image">
                                            <div class="time bg-green">
                                                Топ відео
                                            </div>
                                            <div class="rate-product">
                                                <div class="link-review clearfix">
                                                    <div class="button-product float-left">
                                                        <button type="button" class="flat-button"
                                                                onclick="location.href='#'">bar & coffe
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="info-product">
                                                    <h6 class="title"><a
                                                            href="/have-video/{{$product->slug}}">{{$product->title}}</a>
                                                    </h6>
                                                    <p>{{$product->maps}}</p>
                                                    <a href="#" class="heart">
                                                        <i class="ion-android-favorite-outline"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-product">
                                            <div class="tm">
                                                TM
                                            </div>
                                            <div class="text">
                                                <p>{{$product->description_short}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

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
                        </div><!-- /.blog-pagination -->
                    </div><!-- /.col-lg-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </section>

        @include('layouts.newsletter')
        @include('layouts.footer')


        <script src="/javascript/jquery.min.js"></script>
        <script src="/javascript/tether.min.js"></script>
        <script src="/javascript/bootstrap.min.js"></script>
        <script src="/javascript/jquery.easing.js"></script>
        <script src="/javascript/jquery-waypoints.js"></script>
        <script src="/javascript/bootstrap-slider.min.js"></script>
        <script src="/javascript/jquery-countTo.js"></script>
        <script src="/javascript/jquery.cookie.js"></script>
        <script src="/javascript/parallax.js"></script>
        <script src="/javascript/smoothscroll.js"></script>

        <script src="/javascript/main.js"></script>
    </body>
    </html>
@endsection
