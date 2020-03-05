@extends('layouts\app')

@section('content')


    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/bootstrap.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/responsive.css">

    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="/revolution/css/layers.css">
    <link rel="stylesheet" type="text/css" href="/revolution/css/settings.css">

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
            <h2 class="loader">Завантаження</h2>
        </div>
    </section>

    <!-- Boxed -->
    <div class="boxed">

        <!-- Header -->
        @include('layouts.HeadMenu')
        <div id="rev_slider_1078_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container"
             data-alias="classic4export" data-source="gallery"
             style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
            <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
            <div id="rev_slider_1078_1" class="rev_slider fullwidthabanner" style="display:none;"
                 data-version="5.3.0.2">
                <div class="slotholder"></div>
                <ul><!-- SLIDE  -->

                    <!-- SLIDE 1 -->
                    <li data-index="rs-3050" data-transition="slideremovedown" data-slotamount="7"
                        data-hideafterloop="0" data-hideslideonmobile="off" data-easein="Power4.easeInOut"
                        data-easeout="Power4.easeInOut" data-masterspeed="2000" data-rotate="0"
                        data-saveperformance="off" data-title="Ken Burns" data-param1="" data-param2="" data-param3=""
                        data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9=""
                        data-param10="" data-description="">

                        <!-- MAIN IMAGE -->
                        <img src="images/slides/1.jpg" alt="" data-bgposition="center center" data-kenburns="off"
                             data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120"
                             data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0"
                             data-bgparallax="10" class="rev-slidebg" data-no-retina>
                        <!-- LAYERS -->

                        <!-- LAYER NR. 12 -->
                        <div class="tp-caption title-slide"
                             id="slide-3050-layer-1"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['-128','-128','-128','-50']"
                             data-fontsize="['65','65','45','30']"
                             data-lineheight="['65','65','45','35']"
                             data-fontweight="['600','600','600','600']"
                             data-width="none"
                             data-height="none"
                             data-whitespace="nowrap"

                             data-type="text"
                             data-responsive_offset="on"

                             data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                             data-textAlign="['center','center','center','center']"
                             data-paddingtop="[10,10,10,10]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 16; white-space: nowrap;">Допоможемо знайти відео ДТП
                        </div>

                        <!-- LAYER NR. 13 -->
                        <div class="tp-caption sub-title"
                             id="slide-3050-layer-4"
                             data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                             data-y="['middle','middle','middle','middle']" data-voffset="['-32','-32','-32','20']"
                             data-fontsize="['20',20','20','14']"
                             data-lineheight="['35','35','35','20']"
                             data-fontweight="['300','300','300','300']"
                             data-width="['1200','660','660','350']"
                             data-height="none"
                             data-whitespace="['nowrap',normal','normal','normal']"

                             data-type="text"
                             data-responsive_offset="on"

                             data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                             data-textAlign="['center','center','center','center']"
                             data-paddingtop="[0,0,0,0]"
                             data-paddingright="[0,0,0,0]"
                             data-paddingbottom="[0,0,0,0]"
                             data-paddingleft="[0,0,0,0]"

                             style="z-index: 17; white-space: nowrap;">Знайдіть очевидців ДТП <span>в один клік. </span>
                            Укажіть місце і час дорожньо-транспортної пригоди, <br> і очевидці зможуть поділитись з вами
                            своїми фото та відео ДТП
                        </div>
                    </li>
                </ul>
            </div>
        </div><!-- END REVOLUTION SLIDER -->

        <div class="container">
            <div class="wrap-form">
                <div class="flat-formsearch ">
                    <form novalidate="" class="search-form form-filter  row" id="searchform" method="post"
                          action="/search">
                        @csrf
                        <span class="input-question col-md-4">
                            <input type="text" placeholder="Ввести адресу" name="address" id="question">
                        </span>
                        <span class="input-location  col-md-4">
                            <input type="text" placeholder="Радіус (км)" id="location" disabled>
                            <span class="filter">
                                <input id="ex8" data-slider-id='ex1Slider' name="radius" type="text" data-slider-min="0"
                                       data-slider-max="35"
                                       data-slider-step="1" data-slider-value="10"/>
                            </span>
                        </span>

                        <span class=" text-right  col-md-3">
                            <button class="flat-button">Пошук <i class="ion-ios-search-strong"></i></button>
                        </span>
                    </form>
                </div>
            </div>
        </div>

        <section class="flat-row section-client">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section text-center">
                            <h1 class="title">Категорії</h1>
                            <div class="sub-title">
                                Що вас цікавить
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="flat-client" data-item="4" data-nav="true" data-dots="false" data-auto="false">
                            <a href="/have-video" title="">
                                <div class="client">
                                    <div class="featured-client">
                                        <img src="images/clients/1.jpg" alt="image">
                                    </div>
                                    <div class="content-client clearfix">
                                        <div class="icon">
                                            <img src="images/clients/icon1.png" alt="image">
                                        </div>
                                        <div class="text">
                                            <h6>Я очевидець ДТП</h6>
                                            <p>45 матеріалів</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="/search-video" title="">
                                <div class="client">
                                    <div class="featured-client">
                                        <img src="images/clients/2.jpg" alt="image">
                                    </div>
                                    <div class="content-client clearfix">
                                        <div class="icon">
                                            <img src="images/clients/icon2.png" alt="image">
                                        </div>
                                        <div class="text">
                                            <h6>Домоможіть знайти</h6>
                                            <p>45 запросів</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <div class="client">
                                <div class="featured-client">
                                    <img src="images/clients/3.jpg" alt="image">
                                </div>
                                <div class="content-client clearfix">
                                    <div class="icon">
                                        <img src="images/clients/icon3.png" alt="image">
                                    </div>
                                    <div class="text">
                                        <h6><a href="#" title="">Як розістити прохання про допомогу</a></h6>

                                    </div>
                                </div>
                            </div>
                            <div class="client">
                                <div class="featured-client">
                                    <img src="images/clients/1.jpg" alt="image">
                                </div>
                                <div class="content-client clearfix">
                                    <div class="icon">
                                        <img src="images/clients/icon4.png" alt="image">
                                    </div>
                                    <div class="text">
                                        <h6><a href="#" title="">Про сайт</a></h6>

                                    </div>
                                </div>
                            </div>
                        </div><!-- /.flat-client -->
                    </div>
                </div>
            </div>
        </section>

        <section class="flat-row section-product bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section text-center">
                            <h1 class="title">Найбільш популярні дорожні пригоди</h1>
                            <div class="sub-title">
                                Популярні дорожньо-транспортні пригоди за останній час
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="wrap-flat-product clearfix col-md-12">
                        @foreach($HaveVideos as $HaveVideo)
                            <div class="flat-product">
                                <div class="featured-product">
                                    <img src="images/services/1.jpg" alt="image">
                                    <div class="time bg-green">
                                        Топ відео
                                    </div>
                                    <div class="rate-product">
                                        <div class="link-review clearfix">
                                            <div class="button-product float-left">
                                                <button type="button" class="flat-button">
                                                    @if($HaveVideo->city){{$HaveVideo->city}}
                                                    & {{$HaveVideo->country}}  @else{{$HaveVideo->region}} @endif
                                                </button>
                                            </div>
                                        </div>
                                        <div class="info-product">
                                            <h6 class="title"><a
                                                    href="/have-video/{{$HaveVideo->slug}}">{{$HaveVideo->title}}</a>
                                            </h6>
                                            <p>{{$HaveVideo->maps}}</p>
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
                                        <p>{{$HaveVideo->description_short}}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
                <div class="row">
                    <div class="load-more text-center col-md-12">
                        <a href="/have-video">
                            <button type="button" class="flat-button">Переглянути більше</button>
                        </a>
                    </div>
                </div>


            </div>
        </section>

        <section class="flat-row section-download parallax parallax2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="flat-counter">
                            <span class="over">Понад</span>
                            <div class="content-counter">
                                <div class="numb-count" data-to="1512999" data-speed="1000"
                                     data-waypoint-active="yes">1,512,999</div>
                            </div>
                            <span class="download">запитів</span>
                        </div>
                        <p>Так, це правда - працює. За допомогою нашого сайта ви можете знайти очевидця аварії.
                            <br> розмістивши запит ви зможете допомогти іншим, або вам допоможуть інші</p>
                        <div class="flat-download">
                            <button type="button" class="flat-button" onclick="location.href='/search-video'"><i
                                    class="ion-help"></i>Допоможіть мені
                            </button>
                            <button type="button" class="flat-button" onclick="location.href='/have-video'"><i
                                    class="ion-android-car"></i>Допомогти іншим
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="flat-row blog-shortcode">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="title-section style2">
                            <h1 class="title">Допоможіть знайти очевидця</h1>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($SearchVideos as $SearchVideo)
                        <div class="col-lg-4 col-sm-6">
                            <article class="post clearfix">
                                <div class="featured-post">
                                    <a href="/search-video/{{$SearchVideo->slug}}"><img src="https://maps.googleapis.com/maps/api/staticmap?zoom=9&size=600x300&maptype=roadmap
&markers=color:red%7Clabel:S%7C{{$SearchVideo->lat ?? 0}},{{$SearchVideo->lng ?? 0}}&key=AIzaSyBUrGc3fA_1Atz-Nw8ZdHJrzq8ou61TvxU"
                                                                                        alt="image"></a>
                                    <ul class="post-comment">
                                        <li class="date">
                                            27
                                        </li>
                                        <li class="month">
                                            AUG
                                        </li>
                                    </ul>
                                </div><!-- /.feature-post -->
                                <div class="content-post">
                                    <ul class="meta-data clearfix">
                                        <li class="category">
                                            @foreach($SearchVideo->tags as $tag)
                                                <a href="/tag/{{$tag->slug ?? ''}}">{{$tag->name ?? ''}}</a>
                                                , @endforeach
                                        </li>
                                        <li> запит від: <a href="#">Юрій</a></li>
                                    </ul><!-- /.meta-post -->
                                    <h3 class="title-post"><a href="/search-video/{{$SearchVideo->slug}}">
                                            {{$SearchVideo->title}}
                                        </a></h3>
                                    <p>{{$SearchVideo->description_short}} </p>
                                    <div class="more-link">
                                        <a href="/search-video/{{$SearchVideo->slug}}">Читати детальніше</a>
                                    </div>
                                </div><!-- /.content-post -->
                            </article>
                        </div>
                    @endforeach
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
        <script src="/javascript/jquery-countTo.js"></script>
        <script src="/javascript/owl.carousel.js"></script>
        <script src="/javascript/jquery.cookie.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/4.0.5/handlebars.min.js"></script>
        <script src="/javascript/parallax.js"></script>
        <script src="/javascript/bootstrap-slider.min.js"></script>
        <script src="/javascript/smoothscroll.js"></script>

        <script src="/javascript/main.js"></script>

        <!-- Revolution Slider -->
        <script src="/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script src="/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script src="/revolution/js/slider.js"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
        <script src="/revolution/js/extensions/revolution.extension.actions.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.carousel.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.migration.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script src="/revolution/js/extensions/revolution.extension.video.min.js"></script>

    </body>
    </html>


@endsection
