@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>
                        O Japensouse é um projeto onde você e os membros do seu time se reunem para decidirem o futuro de uma nova idéia. Todas as suas ações são separadas dos outros membros, o sistema decide automaticamente quando aprovar ou reprovar uma idéia de forma geral e decisiva.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Interações</div>

                <div class="panel-body">
                    <p class="text-center">
                        <span class="fa fa-5x fa-pencil" aria-hidden="true"></span>
                    </p>

                    <p>
                        Todas as suas interações são separadas dos outros membros, isso é, se você aprovar, pré-aprovar, remover ou favoritar uma idéia, nenhum outro membro vai ser afetado pela sua decisão.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Automágico</div>

                <div class="panel-body">
                    <p class="text-center">
                        <span class="fa fa-5x fa-mortar-board" aria-hidden="true"></span>
                    </p>

                    <p>
                        O sistema está configurado para realizar decisões automáticas com os dados coletados, por exemplo, se uma idéia é aprovada por você e todos os outros membros ela recebe uma aprovação definitiva do sistema.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="panel panel-default">
                <div class="panel-heading">Relatórios</div>

                <div class="panel-body">
                    <p class="text-center">
                        <span class="fa fa-5x fa-area-chart" aria-hidden="true"></span>
                    </p>

                    <p>
                        Na página de <a href="{{ route('reports') }}">relatórios</a> você pode acompanhar o andamento do projeto e das idéias de diversas maneiras.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
