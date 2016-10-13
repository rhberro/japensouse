<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>japensouse</title>

        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">
    </head>

    <body class="berro-error-body">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1>403</h1>
                    <h2>Acesso negado.</h2>
                    <p>Você não tem permissão para acessar a esta página.</p>
                    <i class="fa fa-lock animated shake"></i>
                    <p>Clique <a href="{{ url()->previous()  }}">aqui</a> para voltar.</p>
                </div>
            </div>

            @include('layouts._footer')
        </div>
    </body>
</html>