@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group pull-right" role="group" aria-label="Idéias">
                <a href="{{ route('users.create') }}" class="btn btn-default" role="button">Adicionar um novo usuário</a>
                <a href="{{ route('users.edit', auth()->id()) }}" class="btn btn-default" role="button">Editar meu perfil</a>
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
                    Usuários
                </div>

                <table class="table table-condensed table-hover">
                    <tbody>
                        @each('users._user', $users, 'user', 'users._empty')
                    </tbody>
                </table>

                <div class="panel-footer">
                    <div class="row">
                        <div class="col-xs-12">
                            <span>
                                Mostrando {{ $users->firstItem() }} - {{ $users->lastItem() }} usuários de um total de {{ $users->total() }}.
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 text-center">
                {{ $users->appends(request()->all())->links() }}
            </div>
        </div>
    </div>
@endsection
