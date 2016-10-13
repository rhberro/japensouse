@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="btn-group pull-right" role="group" aria-label="Desfazer alterações">
                <a href="{{ route('users.edit', $user) }}" class="btn btn-default" role="button">Desfazer alterações</a>
            </div>
        </div>
    </div>

    <hr>

    {!! Form::model($user, ['method' => 'patch', 'url' => route('users.update', $user)]) !!}

        <div class="row">
            <div class="col-xs-3">
                <img src="{{ $user->gravatar(200) }}" alt="{{ $user->name }}" width="200" height="200">
            </div>

            <div class="col-xs-9">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="form-group">
                            {{ Form::label('id', 'Código') }}
                            {{ Form::text('id', null, ['class' => 'form-control', 'placeholder' => 'Código', 'readonly']) }}
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="form-group">
                            {{ Form::label('created_at', 'Criado em') }}
                            {{ Form::text('created_at', null, ['class' => 'form-control', 'placeholder' => 'Criado em', 'readonly']) }}
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="form-group">
                            {{ Form::label('updated_at', 'Atualizado em') }}
                            {{ Form::text('updated_at', null, ['class' => 'form-control', 'placeholder' => 'Atualizado em', 'readonly']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Nome') }}
                            {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Nome', 'autofocus']) }}
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) }}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            {{ Form::label('password', 'Senha') }}
                            {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Senha']) }}
                        </div>
                    </div>

                    <div class="col-xs-6">
                        <div class="form-group">
                            {{ Form::label('password_confirmation', 'Confirmar Senha') }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirmar Senha']) }}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr>

        <div class="row">
            <div class="col-xs-12">
                <button type="submit" class="btn btn-primary pull-right" role="button">Atualizar dados do usuário</button>
            </div>
        </div>

    {!! Form::close() !!}
@stop
