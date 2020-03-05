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
                <form novalidate="" class="filter-form row clearfix" id="filter-form" method="post" action="/search">
                    @csrf
                    <div class="col-lg-6">
                        <p class="book-form-address icon">
                            <input type="text" name="address" placeholder="Адреса" name="address" required="">
                            <i class="ion-android-locate"></i>
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <p class="location">Радіус <i class="ion-location float-right"></i></p>
                        <p class="input-location form-filter">
                        <span class="filter">
                            <input id="ex8" data-slider-id='ex1Slider' name="radius" type="text" data-slider-min="0"
                                   data-slider-max="35" data-slider-step="1" data-slider-value="10"/>
                        </span>
                        </p>

                    </div>
                    <div class="col-lg-2">
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
                                    <p><span>{{ count($products)}}</span> завантажених відео </p>
                                </div>
                                <div class="one-three more-filter">
                                    <ul class="unstyled">
                                        <li class="current"><a class="title"> Фільтр <i
                                                    class="fa fa-angle-right"></i></a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="one-three sortby">
                                    <ul class="unstyled">
                                        <li class="current"><a class="title">Сортування: Останні спочатку <i
                                                    class="fa fa-angle-right"></i></a>
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
                                            <a href="/have-video/{{$product->slug}}"> <img
                                                    src="https://drive.google.com/thumbnail?id={{$product->link}}&sz=w360-h237"
                                                    alt="image" class="h-video"></a>
                                            <div class="time bg-green">
                                                @if($product->viewed >10) Топ відео @endif
                                            </div>
                                            <div class="rate-product">
                                                <div class="link-review clearfix">
                                                    <div class="button-product float-left">
                                                        <button type="button" class="flat-button">
                                                            @if($product->city){{$product->city}}
                                                            & {{$product->country}}  @else{{$product->region}} @endif
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="info-product">
                                                    <h6 class="title"><a
                                                            href="/have-video/{{$product->slug}}">{{$product->title}}</a>
                                                    </h6>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-product">
                                            <div class="tm"
                                                 style="background-color:@if($product->viewed <10) #f1c407 @elseif($product->viewed >30) #18ba60 @else #e8280b @endif ;">
                                                ОП
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
                            <ul class="pagination pull-right">
                                {{$products->links()}}
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
