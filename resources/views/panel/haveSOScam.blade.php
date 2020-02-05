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

        <div class="page-title parallax parallax1">
            <div class="section-overlay">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-title-heading">
                            <h1 class="title">Додати відео ДТП</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Головна</a></li>
                                <li> -</li>
                                <li>Додати відео дорожньо-транспортної пригоди</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->

        @if (Route::has('login'))
            @auth

            @else
                <section class="flat-row flat-note bg-red">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <p>Вам потрібно бути залогіненим</p>
                            </div>
                            <div class="col-lg-6">
                                <div class="note-button float-right">
                                    <a data-toggle="modal" href="#popup_login" class="flat-button">Залогінитись / Пройти
                                        швидку
                                        реєсрацію</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endauth
        @endif


        <section class="flat-row page-addlisting">
            <div class="container">
                <div class="add-filter">
                    <div class="row">
                        <div class="col-lg-2">
                            <h5 class="title-list">Basic Listing</h5>
                        </div>
                        <div class="col-lg-10 widget-form">
                            <form method="post" action="#" class="filter-form form-addlist">
                                <p class="input-info">
                                    <label class="nhan">Заголовок*</label>
                                    <input type="text" name="title" id="title">
                                </p>
                                <p class="input-info">
                                    <label class="nhan">Короткий опис події*</label>
                                    <textarea class="" tabindex="4" name="description_short"></textarea>
                                </p>
                                <p class="input-info">
                                    <label class="nhan">Повний опис*</label>
                                    <textarea class="" tabindex="4" name="description"></textarea>
                                </p>
                                <p class="input-info icon">
                                    <label class="nhan">Категорія*</label>
                                    <select class=" dropdown_sort">
                                        <option value="">All Categories</option>
                                        <option value="">Hotel &amp; travel</option>
                                        <option value="">Real Estate</option>
                                        <option value="">Restaurant</option>
                                        <option value="">Healthy &amp; Fitness</option>
                                        <option value="">Food and coffee</option>
                                        <option value="">Drinks</option>
                                    </select>
                                    <i class="fa fa-angle-down"></i>
                                </p>
                                <p class="input-info">
                                    <label class="nhan">Адреса*</label>
                                    <textarea class="" tabindex="4" name="maps"></textarea>
                                </p>
                            </form>

                            <div class="more-filter">
                                <label class="nhan">Додаткові параметри*</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="flat-check">
                                            <input type="checkbox" id="wifi" name="category" checked="checked">
                                            <label for="wifi">Wifi</label>
                                        </div>
                                        <div class="flat-check">
                                            <input type="checkbox" id="smoking" name="category">
                                            <label for="smoking">Smoking allowed</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="flat-check">
                                            <input type="checkbox" id="onl" name="category" checked="checked">
                                            <label for="onl">Online Reservation</label>
                                        </div>
                                        <div class="flat-check">
                                            <input type="checkbox" id="park" name="category">
                                            <label for="park">Parking street</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="flat-check">
                                            <input type="checkbox" id="event" name="category">
                                            <label for="event">Events </label>
                                        </div>
                                        <div class="flat-check">
                                            <input type="checkbox" id="ele" name="category">
                                            <label for="ele">Elevator in building</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="flat-check">
                                            <input type="checkbox" id="host" name="category">
                                            <label for="host">Host</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="add-images">
                                <label class="nhan">Додати фото чи відео матеріал</label>
                                <form action="/file-upload" class="dropzone" id="my-awesome-dropzone">

                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="info-contact">
                    <div class="row">
                        <div class="col-lg-2">
                            <h5 class="title-list">Інформація</h5>
                        </div>
                        <div class="col-lg-10 profile">
                            <label class="nhan">Контакти</label>
                            <form method="post" action="#" class="form-contact row">
                                <div class="col-lg-4">
                                    <p class="input-info">
                                        <input type="text" name="title" placeholder="Телефон" required="">
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="input-info">
                                        <input type="email" name="title" placeholder="Email" required="">
                                    </p>
                                </div>
                                <div class="col-lg-4">
                                    <p class="input-info">
                                        <input type="text" name="title" placeholder="Інший веб-профіль" required="">
                                    </p>
                                </div>
                            </form>
                            <ul class="add-section">
                                <li class="twitter"><i class="fa fa-twitter-square twitter"></i><span>Twitter</span><a
                                        href="https://twitter.com/" title="">https://twitter.com/</a><i
                                        class="fa fa-minus-circle float-right"></i></li>
                                <li class="face"><i class="fa fa-facebook-square face"></i><span>Facebook</span><a
                                        href="https://www.facebook.com/" title="">https://www.facebook.com/</a><i
                                        class="fa fa-minus-circle float-right"></i></li>
                                <li class="youtube"><i class="fa fa-youtube-square youtube"></i><span>Youtube</span><i
                                        class="fa fa-minus-circle float-right"></i></li>
                                <li class="add"><a href="#" class="add">Add new section</a><a href="#"
                                                                                              class="float-right"><i
                                            class="fa fa-plus-circle"></i></a></li>
                            </ul>
                            <div class="open-hour">
                                <label class="nhan">Час події*</label>
                                <ul class="list-hour">
                                    <li class="clearfix">
                                        <div class="day">Mon - Sat</div>
                                        <div class="time">
                                            <span class="hour">08</span>
                                            <span class="am">am</span>
                                            <span class="to">to</span>
                                            <span class="hour">05</span>
                                            <span class="am">pm</span>
                                            <a href="#" class="float-right" title=""><i class="fa fa-minus-circle"></i></a>
                                        </div>
                                    </li>
                                    <li class="clearfix">
                                        <div class="day">Day</div>
                                        <div class="time">
                                            <span class="solid">__</span>
                                            <span class="am">am</span>
                                            <span class="to">to</span>
                                            <span class="solid">__</span>
                                            <span class="am">pm</span>
                                            <a href="#" class="float-right"><i class="fa fa-plus-circle"></i></a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="wrap-accadion">
                    <div class="row">
                        <div class="col-lg-2">
                            <h5 class="title-list">Pricing</h5>
                        </div>
                        <div class="col-lg-10">
                            <div class="flat-accordion">
                                <div class="flat-toggle">
                                    <div class="toggle-title active">Section 1</div>
                                    <div class="toggle-content">
                                        <form method="post" action="#" class="form-profile">
                                            <ul class="list-input">
                                                <li class="clearfix excep">
                                                    <p class="input-info title">
                                                        <input type="text" name="nell" placeholder="Nellara">
                                                    </p>
                                                    <p class="input-info descrip">
                                                        <input type="text" name="late"
                                                               placeholder="Late evening craving for some comfort food led me to this place">
                                                    </p>
                                                    <p class="input-info pricing">
                                                        <input type="text" name="price" placeholder="7.99">
                                                        <span>USD</span>
                                                    </p>
                                                    <p class="input-info add-icon">
                                                        <i class="fa fa-minus-circle"></i>
                                                    </p>
                                                </li>
                                                <li class="clearfix">
                                                    <p class="input-info title">
                                                        <input type="text" name="title" placeholder="Title*">
                                                    </p>
                                                    <p class="input-info descrip">
                                                        <input type="text" name="des" placeholder="Description*">
                                                    </p>
                                                    <p class="input-info pricing">
                                                        <input type="text" name="price2" placeholder="Price*">
                                                        <span>USD</span>
                                                    </p>
                                                    <p class="input-info add-icon">
                                                        <a href="#" title=""><i class="fa fa-plus-circle"></i></a>
                                                    </p>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div><!-- /toggle -->
                                <div class="flat-toggle">
                                    <div class="toggle-title">Section 2</div>
                                    <div class="toggle-content">
                                        <form method="post" action="#" class="form-profile">
                                            <ul class="list-input">
                                                <li class="clearfix">
                                                    <p class="input-info title">
                                                        <input type="text" name="title" placeholder="Title*">
                                                    </p>
                                                    <p class="input-info descrip">
                                                        <input type="text" name="des" id="des"
                                                               placeholder="Description*">
                                                    </p>
                                                    <p class="input-info pricing">
                                                        <input type="text" name="price2" id="price2"
                                                               placeholder="Price*">
                                                        <span>USD</span>
                                                    </p>
                                                    <p class="input-info add-icon">
                                                        <a href="#" title=""><i class="fa fa-plus-circle"></i></a>
                                                    </p>
                                                </li>
                                            </ul>
                                        </form>
                                    </div>
                                </div><!-- /toggle -->
                            </div> <!-- /.flat-accordion -->
                            <div class="button-addlisting">
                                <button type="button" class="flat-button"
                                        onclick="location.href='page-addlisting.html'">Add Listing
                                </button>
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
