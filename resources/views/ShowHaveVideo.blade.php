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

        <div class="page-title style2">
            <div class="flat-maps">
                <div>
                    <div id="map"></div>
                    <script>
                        var marker;

                        function initMap() {
                            // Styles a map in night mode.
                            var myLatlng = new google.maps.LatLng({{$video->lat ?? 0}}, {{$video->lng ?? 0}});
                            var map = new google.maps.Map(document.getElementById('map'), {
                                center: myLatlng,
                                zoom: 10,
                                styles: [
                                    {elementType: 'geometry', stylers: [{color: '#242f3e'}]},
                                    {elementType: 'labels.text.stroke', stylers: [{color: '#242f3e'}]},
                                    {elementType: 'labels.text.fill', stylers: [{color: '#746855'}]},
                                    {
                                        featureType: 'administrative.locality',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#d59563'}]
                                    },
                                    {
                                        featureType: 'poi',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#d59563'}]
                                    },
                                    {
                                        featureType: 'poi.park',
                                        elementType: 'geometry',
                                        stylers: [{color: '#263c3f'}]
                                    },
                                    {
                                        featureType: 'poi.park',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#6b9a76'}]
                                    },
                                    {
                                        featureType: 'road',
                                        elementType: 'geometry',
                                        stylers: [{color: '#38414e'}]
                                    },
                                    {
                                        featureType: 'road',
                                        elementType: 'geometry.stroke',
                                        stylers: [{color: '#212a37'}]
                                    },
                                    {
                                        featureType: 'road',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#9ca5b3'}]
                                    },
                                    {
                                        featureType: 'road.highway',
                                        elementType: 'geometry',
                                        stylers: [{color: '#746855'}]
                                    },
                                    {
                                        featureType: 'road.highway',
                                        elementType: 'geometry.stroke',
                                        stylers: [{color: '#1f2835'}]
                                    },
                                    {
                                        featureType: 'road.highway',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#f3d19c'}]
                                    },
                                    {
                                        featureType: 'transit',
                                        elementType: 'geometry',
                                        stylers: [{color: '#2f3948'}]
                                    },
                                    {
                                        featureType: 'transit.station',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#d59563'}]
                                    },
                                    {
                                        featureType: 'water',
                                        elementType: 'geometry',
                                        stylers: [{color: '#17263c'}]
                                    },
                                    {
                                        featureType: 'water',
                                        elementType: 'labels.text.fill',
                                        stylers: [{color: '#515c6d'}]
                                    },
                                    {
                                        featureType: 'water',
                                        elementType: 'labels.text.stroke',
                                        stylers: [{color: '#17263c'}]
                                    }
                                ]
                            });

                            marker = new google.maps.Marker({
                                position: myLatlng,
                            });
                            marker.setMap(map);
                        }

                    </script>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="wrap-pagetitle">
                            <div class="flat-pagetitle">
                                <div class="page-title-heading">
                                    <h1 class="title">{{$video->title}}</h1>
                                </div><!-- /.page-title-captions -->
                                <div class="breadcrumbs style2">
                                    <ul>
                                        <li><i class="ion-ios-location-outline"></i>{{$video->date}}</li>
                                    </ul>
                                </div><!-- /.breadcrumbs -->
                            </div>
                        </div>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        <!-- Blog posts -->
        <section class="main-content page-listing">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <div class="listing-wrap">
                            <div class="tf-gallery">
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
                            </div><!-- /.tf-gallery -->
                            <div class="content-listing">
                                <div class="text">
                                    <h3 class="title-listing">{{$video->title}}</h3>
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
        <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU&callback=initMap"
            async defer></script>
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
