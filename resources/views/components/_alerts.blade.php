
@if (session()->has('success'))
    <div class="animated fadeInDown alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong>Sucesso!</strong>&nbsp;{{ session()->get('success') }}
    </div>
@endif

@if (session()->has('warning'))
    <div class="animated fadeInDown alert alert-warning alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong>Atenção!</strong>&nbsp;{{ session()->get('warning') }}
    </div>
@endif

@if (session()->has('danger'))
    <div class="animated fadeInDown alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong>Falhou!</strong>&nbsp;{{ session()->get('danger') }}
    </div>
@endif

@if (session()->has('info'))
    <div class="animated fadeInDown alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong>Informação!</strong>&nbsp;{{ session()->get('info') }}
    </div>
@endif

@if (session()->has('status'))
    <div class="animated fadeInDown alert alert-info alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong>Atualização!</strong>&nbsp;{{ session()->get('status') }}
    </div>
@endif

@if (session()->has('errors'))
    <div class="animated fadeInDown alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong>Whoops!</strong>

        <ul>
            @foreach (session()->get('errors')->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
