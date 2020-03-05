<section id="newsletter" class="flat-row v1 bg-theme">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="title-section">
                    <h1 class="title">Розсилка оновлень</h1>
                    <div class="sub-title">
                        Підпишіться на оновлення дорожньо-транспортних пригод
                    </div>
                </div>
                <form class="flat-mailchimp" method="post" action="{{url('newsletter')}}">
                    @csrf
                    <div class="field clearfix">
                        <p class="wrap-input-email">
                            <input type="text" tabindex="2" name="email"
                                   placeholder="Ваш Email тут">
                        </p>
                        <p class="wrap-btn">
                            <button type="submit" class=" subscribe-submit effect-button"
                                    title="Subscribe now">Підписатися
                            </button>
                        </p>
                    </div>
                    <div id="subscribe-msg">
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                <p>{{ Session::get('success') }}</p>
                            </div><br/>
                        @endif
                        @if (Session::has('failure'))
                            <div class="alert alert-danger">
                                <p>{{ Session::get('failure') }}</p>
                            </div><br/>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-lg-2">
                <div class="flat-counter text-center">
                    <div class="content-counter">
                        <div class="icon-count">
                            <i class="ion-waterdrop"></i>
                        </div>
                        <div class="name-count">Відслідковують</div>
                        <div class="numb-count" data-to="{{$Newsletter}}" data-speed="{{$Newsletter+100}}"
                             data-waypoint-active="yes">{{$Newsletter}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="flat-counter text-center">
                    <div class="content-counter">
                        <div class="icon-count">
                            <i class="ion-map"></i>
                        </div>
                        <div class="name-count">Місць</div>
                        <div class="numb-count" data-to="{{$h_s_c}}" data-speed="{{$h_s_c+100}}"
                             data-waypoint-active="yes">{{$h_s_c}}</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-2">
                <div class="flat-counter text-center">
                    <div class="content-counter">
                        <div class="icon-count">
                            <i class="ion-ios-people"></i>
                        </div>
                        <div class="name-count">Користувачів</div>
                        <div class="numb-count" data-to="{{$user_count}}" data-speed="{{$user_count+100}}"
                             data-waypoint-active="yes">{{$user_count}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
