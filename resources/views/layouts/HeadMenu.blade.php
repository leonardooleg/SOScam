<header id="header" class="header clearfix">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div id="logo" class="logo float-left">
                    <a href="/" rel="home">
                        <img src="/images/logo.png" alt="image">
                    </a>
                </div><!-- /.logo -->
                <div class="btn-menu">
                    <span></span>
                </div><!-- //mobile menu button -->
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-9">
                <div class="nav-wrap">
                    <nav id="mainnav" class="mainnav float-left">
                        <ul class="menu">
                            <li class="home">
                                <a href="/">Головна</a>
                            </li>
                            <li><a href="/have-video">Відео ДТП</a></li>
                            <li><a href="/search-video">Допоможіть знайти очевидця</a></li>
                            <li><a href="page-about.html">Про проект</a></li>
                            <li>
                                @if (Route::has('login'))
                                    @auth
                                        <a href="/panel"><i class="fa fa-user"></i> Кабінет</a>
                                    @else

                                        <a data-toggle="modal" href="#popup_login"><i class="fa fa-user"></i> Ввійти</a>

                                    @endauth
                                @endif
                            </li>
                        </ul><!-- /.menu -->
                    </nav><!-- /.mainnav -->

                    <div class="button-addlist float-right">
                        <div class="dropdown">
                            <button class="dropdown-toggle flat-button" type="button" id="dropdownMenuButton"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Додати
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item font-weight-bold" href="/panel/have-soscam">Додати ДТП</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item font-weight-bold" href="/panel/search-soscam">Знайти
                                    очевидця</a>
                            </div>
                        </div>


                    </div>
                </div><!-- /.nav-wrap -->
            </div><!-- /.col-lg-8 -->
        </div><!-- /.row -->
    </div>
</header><!-- /.header -->

