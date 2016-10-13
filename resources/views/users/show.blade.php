@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-4">
            <img src="{{ $user->gravatar(200) }}" alt="Gravatar" width="200" height="200">

            <h1 class="berro-gravatar-title">
                {{ $user->name }}
                <small>{{ $user->email }}</small>
            </h1>

            <small>
                Cadastrado {{ $user->created_at->diffForHumans() }}.
            </small>

            <hr>

            @if (auth()->user()->follows()->find($user->id))
                <a href="{{ route('users.unfollow', $user) }}" class="btn btn-block btn-default">Deixar de seguir</a>
            @else
                <a href="{{ route('users.follow', $user) }}" class="btn btn-block btn-primary">Seguir</a>
            @endif

            <hr>

            <p>
                <i class="fa fa-eye text-muted"></i>
                &nbsp;<strong>{{ $user->idea_user_count }}</strong> idéias visualizadas.
            </p>
            <p>
                <i class="fa fa-bookmark-o text-muted"></i>
                &nbsp;<strong>{{ $user->favourited_count }}</strong> idéias favoritas.
            </p>
            <p>
                <i class="fa fa-thumbs-o-up text-muted"></i>
                &nbsp;<strong>{{ $user->approved_count }}</strong> idéias aprovadas.
            </p>
            <p>
                <i class="fa fa-thumbs-o-down text-muted"></i>
                &nbsp;<strong>{{ $user->preapproved_count }}</strong> idéias reprovadas.
            </p>
            <p>
                <i class="fa fa-trash-o text-muted"></i>
                &nbsp;<strong>{{ $user->removed_count }}</strong> idéias na lixeira.
            </p>
        </div>

        <div class="col-xs-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Atividades
                    <p class="pull-right">
                        Última ação aconteceu em 2 dias.
                    </p>
                </div>

                <div class="panel-body">
                    <p class="text-center">
                        Nenhuma atividade realizada recentemente.
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
