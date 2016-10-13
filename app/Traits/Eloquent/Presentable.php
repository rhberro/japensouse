<?php

namespace App\Traits\Eloquent;

use Carbon\Carbon;

use Collective\Html\Eloquent\FormAccessible;

trait Presentable
{
    use FormAccessible;

    /**
     * Retorna a data de criação da classe atual em um formato
     * legível para o formulário.
     *
     * @param  string  $value
     * @return string
     */
    public function formCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }

    /**
     * Retorna a data de atualização da classe atual em um formato
     * legível para o formulário.
     *
     * @param  string  $value
     * @return string
     */
    public function formUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y H:i:s');
    }
}