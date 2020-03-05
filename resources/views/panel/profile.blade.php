@extends('layouts\app')

@section('content')

    <!-- Bootstrap  -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/bootstrap.css">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/style.css">

    <!-- Responsive -->
    <link rel="stylesheet" type="text/css" href="/css/stylesheets/responsive.css">

    <!-- dropzone -->
    {{--  <link rel="stylesheet" type="text/css" href="/css/stylesheets/dropzone.css">--}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
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
                            <h1 class="title">Профіль користувача</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Домашня сторінка</a></li>
                                <li> -</li>
                                <li>Редагувати дані</li>
                            </ul>
                        </div><!-- /.breadcrumbs -->
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.page-title -->


        <section class="flat-row page-profile bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="flat-user profile">
                            <a href="/panel/" class="edit" title="">Повернутись в профіль <i class="fa fa-backward"></i></a>
                            <ul class="info">
                                <li><a href="#basic-info" title=""><i class="fa fa-user"></i>Стандартна інформація</a>
                                </li>
                                <li><a href="#on-web" title=""><i class="fa fa-link"></i>Ви у Вебі</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="flat-tabs style2" data-effect="fadeIn">
                            <form class="form-horizontal" action="/panel/profile" method="post"
                                  enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="content-tab listing-user profile">
                                    <div class="content-inner active">
                                        <div id="basic-info" class="basic-info">
                                            <h5>Стандартна інформація</h5>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="upload-img">
                                                        <div class="avatar">
                                                            @if(isset($user->avatar)) <img
                                                                src="/storage/{{$user->avatar}}" alt="image"> @else <img
                                                                src="/images/clients/user.png" alt="image">@endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <p class="input-info">
                                                        <label>Ваше ім'я*</label>
                                                        <input type="text" name="name" id="name"
                                                               value="{{$user->name}}">
                                                    </p>
                                                    <p class="input-info">
                                                        <label>Ваш телефон</label>
                                                        <input type="text" name="phone" id="phone"
                                                               value="{{$user->phone}}">
                                                    </p>
                                                    <p class="input-info">
                                                        <label>Ваш email*</label>
                                                        <input type="email" name="email" id="email"
                                                               value="{{$user->email}}">
                                                    </p>
                                                    <div class="input-info">
                                                        <label>Ваш аватар</label>
                                                        <div class="input-group mb-3 add-images">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"
                                                                      id="inputGroupFileAddon01">Оновити аватар</span>
                                                            </div>
                                                            <div class="custom-file">
                                                                <input type="file" name="avatar"
                                                                       class="myfrm custom-file-input"
                                                                       id="inputGroupFile01"
                                                                       aria-describedby="inputGroupFileAddon01">
                                                                <label class="custom-file-label" for="inputGroupFile01">Завантажити
                                                                    фото</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="on-web" class="on-web">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h5>Веб профілі</h5>
                                                </div>
                                                <div class="col-md-8">
                                                    <ul class="add-section">
                                                        <li class="twitter"><i class="fa fa-twitter-square twitter"></i><span>Twitter</span><input
                                                                type="text" name="Twitter" id="Twitter"
                                                                placeholder="https://twitter.com/"
                                                                value="{{$user->Twitter}}"><i
                                                                class="fa fa-minus-circle float-right"></i></li>
                                                        <li class="face"><i
                                                                class="fa fa-facebook-square face"></i><span>Facebook</span><input
                                                                type="text" name="Facebook" id="Facebook"
                                                                placeholder="https://facebook.com/"
                                                                value="{{$user->Facebook}}"><i
                                                                class="fa fa-minus-circle float-right"></i></li>
                                                        <li class="youtube"><i class="fa fa-youtube-square youtube"></i><span>Youtube</span><input
                                                                type="text" name="Youtube" id="Youtube"
                                                                placeholder="https://youtube.com/"
                                                                value="{{$user->Youtube}}"><i
                                                                class="fa fa-minus-circle float-right"></i></li>
                                                        <li class="youtube"><i
                                                                class="fa fa-instagram instagram"></i><span>Instagram</span><input
                                                                type="text" name="Instagram" id="Instagram"
                                                                placeholder="https://instagram.com/"
                                                                value="{{$user->Instagram}}"><i
                                                                class="fa fa-minus-circle float-right"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="update-button text-center">
                                            <button type="submit" class="flat-button">Оновити профіль</button>
                                        </div>
                                    </div>

                                </div>
                            </form>
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
        <script src="/javascript/jquery.cookie.js"></script>
        <script src="/javascript/parallax.js"></script>
        <script src="/javascript/smoothscroll.js"></script>

        <script src="/javascript/main.js"></script>
        <script src="/js/form.js"></script>


    </body>
    </html>
@endsection
