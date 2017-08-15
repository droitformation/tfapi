<form name="login-form" class="clearfix login-form" method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}

    <div class="row">
        <div class="form-group col-md-6 {{ $errors->has('email') ? ' has-error' : '' }}">
            <label for="email">Email/Login</label>
            <input id="email" name="email" class="form-control" type="text" required>

            @if ($errors->has('email'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <div class="form-group col-md-6 {{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Mot de passe</label>
            <input id="password" name="password" class="form-control" type="password" required>

            @if ($errors->has('password'))
                <span class="help-block text-danger">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

        </div>
    </div>

    <div class="checkbox pull-left mt-0 mb-0">
        <label for="form_checkbox">
            <input name="remember" {{ old('remember') ? 'checked' : '' }} type="checkbox">Se souvenir de moi
        </label>
        <p><a class="text-theme-colored font-weight-600 font-12" href="{{ route('password.request') }}">Mot de passe perdu?</a></p>
    </div>
    <div class="form-group pull-right mt-0 mb-0">
        <button type="submit" class="btn btn-dark btn-sm">Se connecter</button>
    </div>
</form>


