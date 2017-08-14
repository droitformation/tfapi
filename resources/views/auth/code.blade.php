<form name="login-form" class="clearfix login-form" method="POST" action="{{ route('code') }}">
    {{ csrf_field() }}
    <label for="username">Code d'accès  </label>
    <div class="input-group">
        <input id="code" name="code" class="form-control" type="text" placeholder="Code">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-dark btn-sm">Envoyer</button>
        </span>
    </div><!-- /input-group -->
    <p class="mt-10 mb-10">Obtenu avec l'ouvrage <br/><a href="{{ url('') }}" class="text-info">"Le droit pour le praticien"</a></p>
</form>