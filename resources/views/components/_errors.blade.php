@if ($errors->any())
    <div class="animated fadeInDown alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

        <strong>Falhou!</strong>
        @foreach ($errors->all() as $error)
            &nbsp;{{ $error }}
        @endforeach
    </div>
@endif
