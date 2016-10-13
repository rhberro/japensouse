@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group pull-right" role="group" aria-label="Idéias">
                <a href="{{ route('ideas') }}" class="btn btn-default {{ Route::is('ideas') ? 'active' : null }}" role="button">
                    Todas as idéias
                </a>
                <a href="{{ route('ideas.favourited') }}" class="btn btn-default {{ Route::is('ideas.favourited') ? 'active' : null }}" role="button">
                    Idéias que eu favoritei
                </a>
                <a href="{{ route('ideas.approved') }}" class="btn btn-default {{ Route::is('ideas.approved') ? 'active' : null }}" role="button">
                    Idéias que eu aprovei
                </a>
                <a href="{{ route('ideas.preapproved') }}" class="btn btn-default {{ Route::is('ideas.preapproved') ? 'active' : null }}" role="button">
                    Idéias que eu pré-aprovei
                </a>
                <a href="{{ route('ideas.removed') }}" class="btn btn-default {{ Route::is('ideas.removed') ? 'active' : null }}" role="button">
                    Idéias na lixeira
                </a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12">
            <div class="form-group has-feedback">
                <form method="get" action="{{ request()->url() }}">
                    <div class="input-group">
                        <input type="text" class="form-control" id="search" name="search" value="{{ request()->get('search') }}" placeholder="Digite e pressione enter para procurar" autofocus>

                        <span class="input-group-addon">
                            <i class="fa fa-search text-muted"></i>
                        </span>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Idéias
                </div>

                <table class="table table-condensed table-hover">
                    <tbody>
                        @each('ideas._idea', $ideas, 'idea', 'ideas._empty')
                    </tbody>
                </table>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <span>
                                Mostrando {{ $ideas->firstItem() }} - {{ $ideas->lastItem() }} idéias de um total de {{ $ideas->total() }}.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 text-center">
            {{ $ideas->appends(request()->all())->links() }}
        </div>
    </div>
@endsection
