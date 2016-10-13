@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group pull-right" role="group" aria-label="Idéias">
                <a class="btn btn-default" href="{{ route('ideas.favourite', $idea) }}" role="button">
                    @if ($idea->ideaUserAuthenticated && $idea->ideaUserAuthenticated->favourited)
                        Remover dos favoritos
                    @else
                        Adicionar aos favoritos
                    @endif
                </a>

                <a class="btn btn-default" href="{{ route('ideas.approve', $idea) }}" role="button">
                    @if ($idea->ideaUserAuthenticated  && $idea->ideaUserAuthenticated->approved)
                        Remover aprovação
                    @else
                        Aprovar esta idéia
                    @endif
                </a>

                <a class="btn btn-default" href="{{ route('ideas.preapprove', $idea) }}" role="button">
                    @if ($idea->ideaUserAuthenticated  && $idea->ideaUserAuthenticated->preapproved)
                        Remover reprovação
                    @else
                        Reprovar esta idéia
                    @endif
                </a>

                <a class="btn btn-danger" href="{{ route('ideas.remove', $idea) }}" role="button">
                    @if ($idea->ideaUserAuthenticated  && $idea->ideaUserAuthenticated->removed)
                        Restaurar esta idéia
                    @else
                        Mover para a lixeira
                    @endif
                </a>
            </div>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-xs-12 text-right">
            <p>
                @if ($idea->ideaUserAuthenticated  && $idea->ideaUserAuthenticated->favourited)
                    <span class="label label-info">Favoritada</span>
                @endif

                @if ($idea->ideaUserAuthenticated  && $idea->ideaUserAuthenticated->approved)
                    <span class="label label-success">Aprovada</span>
                @endif

                @if ($idea->ideaUserAuthenticated  && $idea->ideaUserAuthenticated->preapproved)
                    <span class="label label-warning">Reprovada</span>
                @endif

                @if ($idea->ideaUserAuthenticated  && $idea->ideaUserAuthenticated->removed)
                    <span class="label label-danger">Removida</span>
                @endif
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Idéia

                    <p class="pull-right">
                        Idéia enviada por <i>{{ $idea->name }}</i> em {{ $idea->created_at->diffForHumans() }}.
                    </p>
                </div>

                <div class="panel-body">
                    <h1>
                        {{ $idea->title }}

                        <small>
                            <i>{{ $idea->name }}</i>
                        </small>
                    </h1>

                    <hr>

                    <p>{{ $idea->description }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-2">
            <a href="#" class="thumbnail">
                <img src="{{ Auth::user()->gravatar() }}" alt="Gravatar" width="150" height="150">
            </a>
        </div>

        <div class="col-xs-10">
            <div class="panel panel-default">
                <div class="panel-heading">Escreva</div>

                <form class="form">
                    <div class="panel-body">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group form-inline text-right">
                            <label for="mark">Marcar esta idéia como &nbsp;</label>

                            <select class="form-control">
                                <option>não marcar</option>
                                <option>já existente no mercado</option>
                                <option>um spam</option>
                                <option>fora das normas</option>
                            </select>
                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <button type="submit" class="btn btn-default">Enviar</button>
                    </div>
                </form>
            </div
        </div>
    </div>
@endsection
