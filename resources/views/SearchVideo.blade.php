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
                            <h1 class="title">Домоможіть знайти очевидців</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Головна</a></li>
                                <li> -</li>
                                <li>Пошук очевидців</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <!-- Blog posts -->
        <section class="main-content page-listing-grid">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="flat-select clearfix">
                            <div class="float-left width50 clearfix">
                                <div class="one-three showing">
                                    <p><span>16</span> Запитів на допомогу</p>
                                </div>
                                <div class="one-three more-filter">
                                    <ul class="unstyled">
                                        <li class="current"><a href="#" class="title">Більше фільтрів <i
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
                                        <li class="current"><a href="#" class="title">Сортувати: Віпидково <i
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
                            <div class="float-right">
                                <div class="flat-sort">
                                    <a href="listing-list.html" class="course-list-view active"><i
                                            class="fa fa-list"></i></a>
                                    <a href="listing-grid.html" class="course-grid-view "><i class="fa fa-th"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="listing-list">
                            @foreach($products as $product)

                                <div class="flat-product clearfix">
                                    <div class="featured-product">
                                        <img src="https://maps.googleapis.com/maps/api/staticmap?zoom=9&size=300x150&maptype=roadmap
&markers=color:red%7Clabel:S%7C{{$product->lat ?? 0}},{{$product->lng ?? 0}}&key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU"
                                             alt="image">
                                        <div class="time">
                                            Новий
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
                                                    href="/search-video/{{$product->slug}}">{{$product->title}}</a></h6>
                                            <p>{{$product->maps}}</p>
                                            <a href="#" class="heart">
                                                <i class="ion-android-favorite-outline"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        </div>
                        <div class="blog-pagination style2 text-center">
                            <ul class="pagination pull-right">
                                {{$products->links()}}
                            </ul><!-- /.flat-pagination -->
                        </div><!-- /.blog-pagination -->
                    </div><!-- /.col-lg-9 -->
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <div class=" widget widget-form style2">
                                <h5 class="widget-title">
                                    Пошуковий бокс
                                </h5>
                                <form novalidate="" class="filter-form clearfix" id="filter-form" method="post"
                                      action="#">
                                    <p class="book-notes">
                                        <input type="text" placeholder="Укажіть місце пошуку" name="question"
                                               required="">
                                    </p>
                                    <p class="book-form-select icon">
                                        <select class=" dropdown_sort">
                                            <option value="">Категорія</option>
                                            <option value="">Hotel & travel</option>
                                            <option value="">Real Estate</option>
                                            <option value="">Restaurant</option>
                                            <option value="">Healthy & Fitness</option>
                                            <option value="">Food and coffee</option>
                                            <option value="">Drinks</option>
                                        </select>
                                        <i class="fa fa-angle-down"></i>
                                    </p>
                                    <p class="book-form-address icon">
                                        <input type="text" placeholder="Країну" name="address" required="">
                                        <i class="ion-android-locate"></i>
                                    </p>
                                    <p class="location">Радіус <i class="ion-location float-right"></i></p>
                                    <p class="input-location form-filter">
                                    <span class="filter">
                                        <input id="ex8" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                               data-slider-max="10" data-slider-step="1" data-slider-value="5"/>
                                    </span>
                                    </p>
                                    <p class="form-submit text-center">
                                        <button class="flat-button">Знайти <i class="ion-ios-search-strong"></i>
                                        </button>
                                    </p>
                                </form>
                            </div>
                            <div class="widget widget-map">
                                <h5 class="widget-title">Карта</h5>
                                <p>Можливо тут буде карта з цими координатами.</p>
                                <div class="flat-maps">
                                    <div class="maps" style="width: 100%; height: 359px; "></div>
                                </div>
                            </div>
                        </div><!-- /.sidebar -->
                    </div><!-- /.col-md-3 -->
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
        <script src="/javascript/gmap3.min.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUIc2-TTbn2IGJ4W0_0ePkv3xBvA_2sCM&region=GB"></script>
        <script src="/javascript/jquery-countTo.js"></script>
        <script src="/javascript/jquery.cookie.js"></script>
        <script src="/javascript/parallax.js"></script>
        <script src="/javascript/smoothscroll.js"></script>

        <script src="/javascript/main.js"></script>
    </body>
    </html>



@endsection
