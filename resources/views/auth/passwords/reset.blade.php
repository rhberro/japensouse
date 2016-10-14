<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>

        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <h1 class="text-center text-uppercase"><strong><i class="fa fa-2x fa-lightbulb-o"></i></strong></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <h1 class="text-center text-uppercase"><strong>{{ config('app.name') }}</strong></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <hr>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    @include('components._alerts')
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <form class="form" role="form" method="post" action="{{ url('/password/reset') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email" class="control-label">Email</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <label for="password" class="control-label">Senha</label>
                            <input id="password" type="password" class="form-control" name="password" placeholder="Senha" autofocus>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="control-label">Confirmar senha</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirmar senha">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-block btn-primary">
                                Resetar senha
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <a class="btn btn-block btn-link" href="{{ route('login') }}">Entrar</a>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    @include('layouts._footer')
                </div>
            </div>
        </div>

        <script src="{{ elixir('js/app.js') }}"></script>
    </body>
</html>
