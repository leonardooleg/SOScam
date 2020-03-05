@extends('layouts\app')

@section('content')
    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/bootstrap.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/style.css">
    <!-- Scrollbar Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/jquery.mCustomScrollbar.css">
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


        <section class="listing-maps clearfix row">
            <div class="col-md-3 widget widget-form ">
                <form novalidate="" class="filter-form clearfix" id="filter-form" method="post" action="/search">
                    @csrf
                    <h5 class="title">Знайдіть потрібну Вам ДТП</h5>
                    <p class="book-notes icon">
                        <input type="text" placeholder="За якою адресю шукати?" name="address" required=""
                               @if($address)value="{{$address}}"@endif>
                        <i class="fa fa-search"></i>
                    </p>


                    <p class="location">Радіус (в км.) <i class="ion-location float-right"></i></p>
                    <p class="input-location form-filter">
                    <span class="filter">
                        <input id="ex8" data-slider-id='ex1Slider' type="text" name="radius" data-slider-min="0"
                               data-slider-max="35" data-slider-step="1" @if($radius) data-slider-value="{{$radius}}"
                               @else data-slider-value="10"@endif/>
                    </span>
                    </p>


                    <div class="button-search">
                        <button type="submit" class="effect-button">Пошук</button>
                    </div>
                </form>
            </div>
            <div class="col-md-6 scroll-product style2 reponsive">
                <div class=" content mCustomScrollbar">
                    <div class="wrap-product clearfix">
                        <div class="show-item clearfix">
                            <p class="float-left"><i class="ion-ios-eye"></i>16 Found Listings</p>
                            <div class="float-right">
                                <div class="flat-sort">
                                    <a class="course-grid-view active"><i class="fa fa-th"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @php $points = array()@endphp

                            @foreach($videos as $product)
                                @php $points[] = array('name' => (string)'Alert', 'coordinates' => (string)$product->lat.', '.$product->lng) @endphp

                                <div class="col-md-5 flat-product">
                                    <div class="featured-product">
                                        <img src="images/services/1.jpg" alt="image">
                                        <div class="time bg-green">
                                            Топ відео
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
                        <div class="blog-pagination style2 text-center">
                            <ul class="pagination pull-right">
                                {{$videos->links()}}
                            </ul><!-- /.flat-pagination -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 style2 reponsive">
                <div class="flat-maps">
                    <div class="maps" id="my_map" style="width: 100%; height: 868px; "></div>

                    <script>
                            @php
                                echo 'var organizations = '.json_encode($points).';
'
                            @endphp
                        var map, circle, circleOptions, setCenter, marker, organizations_markers;

                        function initialize() {
                            var myLatlng = new google.maps.LatLng({{$lat ?? 49.05899246821272}}, {{$lng ?? 33.46862870870211}}); //Kiev
                            var myOptions = {
                                zoom: 11,
                                center: myLatlng,
                                mapTypeId: google.maps.MapTypeId.HYBRID
                            };
                            map = new google.maps.Map(document.getElementById("my_map"), myOptions);

                            /* setCenter = true;*/
                            var radius =  {{$radius ?? 3940}};
                            circleOptions = {
                                fillColor: "#00AAFF",
                                fillOpacity: 0.5,
                                strokeColor: "#FFAA00",
                                strokeOpacity: 0.8,
                                strokeWeight: 2,
                                clickable: false,
                                center: myLatlng,
                                radius: radius * 1000
                            };
                            /*виводити дані які вже є*/
                            circle = new google.maps.Circle(circleOptions);
                            circle.setMap(map);
                            /*marker = new google.maps.Marker({
                                position: myLatlng,
                            });
                            marker.setMap(map);*/
                            /*виводити дані які вже є*/

                            //устанавливаем маркеры организаций
                            organizations_markers = [];
                            for (var i = 0; i < organizations.length; i++) {
                                var ll = organizations[i].coordinates.split(', ');
                                console.log(ll);
                                var latlng = new google.maps.LatLng(ll[0], ll[1]);
                                console.log(radius);
                                console.log(distHaversine(latlng, myLatlng));

                                if (distHaversine(latlng, myLatlng) <= radius) {
                                    console.log('radius');
                                    organizations_markers[i] = new google.maps.Marker({
                                        position: latlng,
                                        clickable: true
                                    });
                                    organizations_markers[i].setMap(map);

                                }
                            }
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

                        //эта функция используются для определения расстояния между точками на
                        //поверхности Земли, заданных с помощью географических координат
                        //результат возвращается в км
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
            </div>
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
