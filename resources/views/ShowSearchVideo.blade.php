@extends('layouts\app')

@section('content')
    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/bootstrap.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/responsive.css">

    <link rel="stylesheet" type="text/css" href="/css/stylesheets/bootstrap-datetimepicker.min.css">

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
        <div class="page-title parallax parallax1" style="background-position: 50% 9px;">
            <div class="section-overlay">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">{{$video->title}}</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Головна</a></li>
                                <li> -</li>
                                <li>Допоможіть знайти очевидця</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div>


        <!-- Blog posts -->
        <section class="main-content page-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="listing-wrap">
                            <div class="featured-post">
                                <div id="my_map" style="width:100%;height:400px"></div>
                                <script>
                                    var map, circle, circleOptions, setCenter, marker;

                                    function initialize() {
                                        var myLatlng = new google.maps.LatLng({{$video->lat ?? 0}}, {{$video->lng ?? 0}}); //Kiev
                                        var myOptions = {
                                            zoom: 9,
                                            center: myLatlng,
                                            mapTypeId: google.maps.MapTypeId.HYBRID
                                        };
                                        map = new google.maps.Map(document.getElementById("my_map"), myOptions);

                                        setCenter = true;

                                        circleOptions = {
                                            fillColor: "#00AAFF",
                                            fillOpacity: 0.5,
                                            strokeColor: "#FFAA00",
                                            strokeOpacity: 0.8,
                                            strokeWeight: 2,
                                            clickable: false,
                                            center: myLatlng,
                                            radius: {{$video->radius ?? 50000}},
                                        };
                                        /*виводити дані які вже є*/
                                        circle = new google.maps.Circle(circleOptions);
                                        circle.setMap(map);
                                        marker = new google.maps.Marker({
                                            position: myLatlng,
                                        });
                                        marker.setMap(map);
                                        /*виводити дані які вже є*/


                                    }

                                    function loadScript() {
                                        var script = document.createElement("script");
                                        script.src = "http://maps.googleapis.com/maps/api/js?v=3&amp;sensor=false&key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU&callback=initialize";
                                        document.body.appendChild(script);
                                    }

                                    //http://stackoverflow.com/questions/1502590/calculate-distance-between-two-points-in-google-maps-v3
                                    rad = function (x) {
                                        return x * Math.PI / 180;
                                    };

                                    distHaversine = function (p1, p2) {
                                        var R = 6371; // earth's mean radius in km
                                        var dLat = rad(p2.lat() - p1.lat());
                                        var dLong = rad(p2.lng() - p1.lng());

                                        var a = Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                                            Math.cos(rad(p1.lat())) * Math.cos(rad(p2.lat())) * Math.sin(dLong / 2) * Math.sin(dLong / 2);
                                        var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                                        var d = R * c;

                                        return d.toFixed(3);
                                    };

                                    window.onload = loadScript;

                                </script>
                            </div>

                            <div class="content-listing">
                                <div class="text">
                                    <h2 class="title-listing">{{$video->title}}</h2>
                                    <ul class="rating-listing">
                                        <li>
                                            <div class="start-review">
                                            <span class="flat-start">
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                            </span>
                                                <span class="like"> ( 3 reviewers )</span>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="#" class="heart">
                                                <i class="ion-android-favorite-outline"></i>
                                                <span>3</span>
                                            </a>
                                        </li>
                                        <li>
                                            <div class="social-links">
                                                <span>Поділитися:</span>
                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                <a href="#"><i class="fa fa-google-plus"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <p>{{$video->description}}</p>
                                    <br>
                                </div>
                                <h3>Маю свої фото</h3>
                                <div class="tf-gallery " style="margin-right: -82px;">
                                    <div id="tf-slider">
                                        <ul class="slides">
                                            @foreach($photo as $photo_one)
                                                <li>
                                                    @if($photo_one->type==1) <img @else
                                                        <iframe
                                                            @endif @if($photo_one->type==1) src="{{asset('/storage/'. $photo_one->link ?? '') }}"
                                                            style="width:auto; height:450px;"
                                                            @else src="{{$photo_one->link ?? '' }}"
                                                            @endif  class="head_have_photo" width="100%" height="450px"
                                                            @if($photo_one->type==2)  frameborder="0"
                                                            allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                            allowfullscreen @endif>@if($photo_one->type==2) </iframe> @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div id="tf-carousel">
                                        <ul class="slides">
                                            @foreach($photo as $photo_one)
                                                <li>
                                                    <img
                                                        @if($photo_one->type==1) src="{{asset('/storage/'. $photo_one->link ?? '') }}"
                                                        @else src="{{asset('/storage/uploads/youtube.jpg' ?? '' )}}"
                                                        @endif  width="100%" height="450px"
                                                        style="width:100%; height:200px;" class="head_have_photo">
                                                </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>

                                <h3 class="title-listing">Характеристики</h3>
                                <div class="wrap-list clearfix">
                                    <ul class="list-inline">
                                        @foreach($video->tags as $tag)
                                            <li class="list-inline-item"><a href="/tag/{{$tag->slug ?? ''}}"> <span><i
                                                            class="fa fa-check"></i></span>{{$tag->name ?? ''}}</a>
                                            </li> @endforeach
                                    </ul>
                                </div>
                                <hr/>
                                <div class="list-comment">
                                    <div id="disqus_thread"></div>
                                    <script>

                                        /**
                                         *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                                         *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                                        /*
                                        var disqus_config = function () {
                                        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                                        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                                        };
                                        */
                                        (function () { // DON'T EDIT BELOW THIS LINE
                                            var d = document, s = d.createElement('script');
                                            s.src = 'https://leonardohome-online.disqus.com/embed.js';
                                            s.setAttribute('data-timestamp', +new Date());
                                            (d.head || d.body).appendChild(s);
                                        })();
                                    </script>
                                    <noscript>Please enable JavaScript to view the <a
                                            href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
                                    </noscript>


                                </div>

                            </div>
                        </div><!-- /.listing-wrap -->
                    </div><!-- /.col-lg-9 -->
                    <div class="col-lg-3">
                        <div class="sidebar">
                            <div class="widget widget_listing">
                                <h5 class="widget-title">Популярні ДТП</h5>
                                <ul>
                                    <li>
                                        <div class="featured">
                                            <a href="#" class="effect"><img src="/images/flickr/7.jpg" alt="image"></a>
                                        </div>
                                        <div class="info-listing">
                                            <h6><a href="#">Lincoln Square Steak</a></h6>
                                            <div class="start-review">
                                            <span class="flat-start">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                                <a href="#" class="review">12 Reviews</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="featured">
                                            <a href="#" class="effect"><img src="/images/flickr/8.jpg" alt="image"></a>
                                        </div>
                                        <div class="info-listing">
                                            <h6><a href="#">Top 10 French coffe </a></h6>
                                            <div class="start-review">
                                            <span class="flat-start">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                                <a href="#" class="review">7 Reviews</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="featured">
                                            <a href="#" class="effect"><img src="/images/flickr/8.jpg" alt="image"></a>
                                        </div>
                                        <div class="info-listing">
                                            <h6><a href="#">Top 10 French coffe </a></h6>
                                            <div class="start-review">
                                            <span class="flat-start">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                                <a href="#" class="review">7 Reviews</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="featured">
                                            <a href="#" class="effect"><img src="/images/flickr/8.jpg" alt="image"></a>
                                        </div>
                                        <div class="info-listing">
                                            <h6><a href="#">Top 10 French coffe </a></h6>
                                            <div class="start-review">
                                            <span class="flat-start">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </span>
                                                <a href="#" class="review">7 Reviews</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class=" widget widget-form">
                                <form novalidate="" class="book-form clearfix" id="bookform" method="post" action="#">
                                    <div class="form-group">
                                        <div class='input-group date' id='datetimepicker1'>
                                            <input type='text' class="form-control"/>
                                            <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-calendar"></span>
                                        </span>
                                        </div>
                                    </div>
                                    <p class="book-notes">
                                        <input type="text" placeholder="Ваше ім'я" name="author" required="">
                                    </p>
                                    <p class="book-form-email">
                                        <input type="email" placeholder="E-mail" name="email" required="">
                                    </p>
                                    <p class="book-form-email">
                                        <input type="email" placeholder="Телефон" name="phone" required="">
                                    </p>
                                    <p class="book-form-book">
                                        <textarea class="" tabindex="4" placeholder="Повідомлення" name="book"
                                                  required=""></textarea>
                                    </p>
                                    <p class="form-submit text-center">
                                        <button class="book-submit effect-button">Написати автору</button>
                                    </p>
                                </form>
                            </div>
                            <div class="widget widget-contact">
                                <h5 class="widget-title">Контакти автора</h5>
                                <ul>
                                    <li class="adress">PO Box 16122 Collins Street West Victoria 8007 Australia</li>
                                    <li class="phone">+61 3 8376 6284</li>
                                    <li class="email">Yourplace@gmail.com</li>

                                </ul>
                                <div class="social-links">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-google-plus"></i></a>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
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
        <script src="/javascript/jquery-countTo.js"></script>
        <script src="/javascript/gmap3.min.js"></script>
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUIc2-TTbn2IGJ4W0_0ePkv3xBvA_2sCM&region=GB"></script>
        <script src="/javascript/jquery.cookie.js"></script>
        <script src="/javascript/bootstrap-datetimepicker.js"></script>
        <script src="/javascript/bootstrap-datetimepicker.fr.js"></script>
        <script src="/javascript/jquery.flexslider-min.js"></script>

        <script src="/javascript/parallax.js"></script>
        <script src="/javascript/smoothscroll.js"></script>

        <script src="/javascript/main.js"></script>
    </body>
    </html>
@endsection
