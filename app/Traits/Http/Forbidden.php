<?php

namespace App\Traits\Http;

trait Forbidden
{
    /**
     * Aborta a aplicação com uma resposta de acesso
     * não permitido.
     *
     * @return \Illuminate\Http\Response
     */
    public function forbiddenResponse()
    {
        abort(403);
    }
}
