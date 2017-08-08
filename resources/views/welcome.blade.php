<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 200;
                margin: 0;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: left;
                width: 1024px;
                margin: 20px auto;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
        </div>
        <div class="container container-main">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default" style="margin-top: 30px;">
                        <div class="panel-body">
                            <form class="form-inline" method="POST" action="{{ url('search') }}">{!! csrf_field() !!}

                                <div class="input-group date">
                                    <input type="text" class="form-control datepicker" name="period[]" placeholder="début">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                <div class="input-group date">
                                    <input type="text" class="form-control datepicker" name="period[]" placeholder="fin">
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="input" class="sr-only">Recherhe</label>
                                    <input type="text" class="form-control" name="terms" id="input" placeholder="Recherche" style="width:400px;">
                                </div>
                                <div class="checkbox" style="margin: 0 3px;">
                                    <label>
                                        <input name="published" value="1" type="checkbox"> Pour publication
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-info">OK</button>
                            </form>
                        </div>
                    </div>

                    <h2>Résultats</h2>
                    <?php
                        echo '<pre>';
                        print_r($params);
                        echo '</pre>';
                    ?>
                    @if(!$results->isEmpty())
                        @foreach($results as $decision)
                            <h3>{{ $decision->numero }}</h3>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>



        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.fr-CH.min.js"></script>
        <script>
            $( function() {
                $('.datepicker').datepicker({
                    language: 'fr',
                    format: 'yyyy-mm-dd',
                    dateFormat: 'yyyy-mm-dd',
                    autoclose: true,
                    defaultViewDate: 'today',
                });
            });
        </script>
    </body>
</html>
