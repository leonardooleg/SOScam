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
                            <h1 class="title">Подати запит на допомогу пошуку очевидця ДТП</h1>
                        </div><!-- /.page-title-captions -->
                        <div class="breadcrumbs">
                            <ul>
                                <li><a href="/">Головна</a></li>
                                <li> -</li>
                                <li>Додати запит-пошук дорожньо-транспортної пригоди</li>
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
                <form class="form-horizontal" @if(isset($video->id))action="/panel/search-soscam/{{$video->id}}"
                      @else action="/panel/search-soscam" @endif method="post"
                      enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{-- Form include --}}
                    @include('panel.partials.searchForm')
                    <input type="hidden" name="created_by" value="{{Auth::id()}}">
                </form>
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
        <script src="{{ asset('js/form.js') }}" defer></script>
    </body>
    </html>
@endsection
