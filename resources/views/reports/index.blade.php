@extends('layouts.app')

@section('content')
    <div class="row" style="margin-bottom:15px;">
        <div class="col-xs-12">
            <div class="btn-group pull-right" role="group" aria-label="Idéias">
                <a href="{{ route('reports') }}" class="btn btn-default" role="button">Relatório da semana</a>
                <a href="{{ route('reports') }}" class="btn btn-default" role="button">Relatório do mês</a>
                <a href="{{ route('reports') }}" class="btn btn-default" role="button">Relatório do trimestre</a>
                <a href="{{ route('reports') }}" class="btn btn-default" role="button">Relatório do semestre</a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-4">
            <div class="form-group has-feedback">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Data inicíal" autofocus>
                    <span class="input-group-addon"><i class="fa fa-calendar text-muted"></i></span>
                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <div class="form-group has-feedback">
                <div class="input-group">
                    <input type="text" class="form-control" id="search" name="search" placeholder="Data final">
                    <span class="input-group-addon"><i class="fa fa-calendar text-muted"></i></span>
                </div>
            </div>
        </div>

        <div class="col-xs-4">
            <button class="btn btn-default btn-block">Gerar</button>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Relatório de visualizações</div>

                <div class="panel-body">
                    <canvas id="visualizations-chart" width="250" height="250"></canvas>

                    <p>
                        Este relatório mostra a média de visualizações baseado na quantidade de usuários e idéias.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">Relatório de interações</div>

                <div class="panel-body">
                    <canvas id="interactions-chart" width="250" height="250"></canvas>

                    <p>
                        Todas as suas interações são separadas dos outros membros, isso é, se você aprovar, pré-aprovar, remover ou favoritar uma idéia, nenhum outro membro vai ser afetado pela sua decisão.
                    </p>
                </div>
            </div>
        </div>
    </div>
@stop
