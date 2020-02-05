<form class="form-login form-listing" method="POST" action="{{ route('login') }}">
    @csrf
    <h3 class="title-formlogin">{{ __('E-Mail Address') }}</h3>
    <span class="input-login icon-form">
        <input id="email" type="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror"
               name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
         @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
       </span>

    <span class="input-login icon-form"><input id="password" type="password" placeholder="Пароль"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
       </span>
    <div class="flat-fogot clearfix">
        <label class="float-left">
                               <span class="input-check">
                                    <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Запам`ятати') }}
                                    </label>
                                 </div>
                                </span>
        </label>
        <label class="float-right link-register">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Забули пароль?') }}
                </a>
            @endif
        </label>
    </div>
    <span class="wrap-button">
                            <button type="submit" id="login-button" class=" login-btn effect-button" title="log in">Ввійти</button>
                        </span>
</form>
