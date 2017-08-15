@extends('layouts.master')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">

                <div class="panel panel-dark mt-60">
                    <div class="panel-heading">Récupération du Mot de passe</div>
                    <div class="panel-body">

                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <p class="text-muted mb-20">
                            Veuillez saisir votre identifiant ou votre adresse de messagerie. Un lien permettant de créer un nouveau mot de passe vous sera envoyé par e-mail.
                        </p>

                        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-dark btn-sm btn-block">Envoyer l'email de récupération</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection
